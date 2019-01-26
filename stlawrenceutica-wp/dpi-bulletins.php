<?php
/*
	Plugin Name: DPI Bulletins
	Plugin URI: http://www.diocesan.com
	Description: Provides a quick method of auto generating links to church bulletins
	Version: 2.1
	Author: Diocesan Publications
	Author URI: http://www.diocesan.com
	License: GPL2
*/

/*  Copyright 2015  Diocesan Publications  (email : rross@diocesan.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Automatic Updates */
require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'http://help.diocesanweb.com/plugins/info.json',
    __FILE__,
	'dpi-bulletins'
);


// Bulletin encytption link
function dpi_bulletins_encrypt_link( $bulletinId, $sunday )
{
	$bulletinsOnline = "http://bulletins.discovermass.com";
	$timestamp = time();
	$key = pack( "H*", "69F693BA89D7224C932A292D14A6262813DA4B443A95F233DBB25E132B4E7E8F" );
	$key_size  = strlen( $key );
	$iv_size = mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC );
	$iv = mcrypt_create_iv( $iv_size, MCRYPT_RAND );
	$plaintext = "{$bulletinId}|{$sunday}|{$timestamp}";
	$ciphertext = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $key, $plaintext, MCRYPT_MODE_CBC, $iv );
	$ciphertext = rawurlencode( base64_encode( $iv . $ciphertext ) );
	$pdf = "{$bulletinsOnline}/download.php?bulletin={$ciphertext}";
	return $pdf;
}



add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'link_action_on_plugin' );
function link_action_on_plugin( $links ) {
	return array_merge(array('settings' => '<a href="' . admin_url( '/options-general.php?page=bulletinssettings' ) . '">' . __( 'Settings', 'domain' ) . '</a>'), $links);
}

/* Widget */
class dpi_bulletins_widget extends WP_Widget {

	// constructor
	function __construct() {
		parent::__construct(
			'dpi_bulletins_widget', // Base ID
			__('DPI Bulletins', 'text_domain'), // Name
			array( 'description' => __( 'The DPI Bulletins Widget', 'text_domain' ), ) // Args
		);
	}

	// widget form creation
	function form($instance) {
	// Check values
	if( $instance) {
		 $title = esc_attr($instance['title']);
		 $text = esc_attr($instance['text']);
		 $bulletins = esc_attr($instance['bulletins']);
	} else {
		 $title = '';
		 $text = '';
		 $bulletins = '4';
	}
?>

    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'dpi_bulletins_widget'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'dpi_bulletins_widget'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('bulletins'); ?>"><?php _e('Bulletins:', 'dpi_bulletins_widget'); ?></label>
    <input class="widefat" style="width: 50px; clear:none;" id="<?php echo $this->get_field_id('bulletins'); ?>" name="<?php echo $this->get_field_name('bulletins'); ?>" type="text" value="<?php echo $bulletins; ?>" maxlength="1" />
    </p>
<?php
}

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['bulletins'] = strip_tags($new_instance['bulletins']);
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);
	   $text = $instance['text'];
	   $volume = $instance['bulletins'];
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="widget-text wp_widget_plugin_box">';

	   // Check if title is set
	   if ( $title ) {
		  echo $before_title . $title . $after_title;
	   }

	   // Check if text is set
	   if( $text ) {
		  echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
	   }


	$bulletinId = get_option( 'dpi_bulletin_id', '555' );

	$quantity = get_option( 'dpi_bulletin_quantity', '4' );
	// Check if quantity is set
	if( $volume ) {
		$quantity = $volume;
	}

	if( $bulletinId != "555" )
	{
		// Get the list of bulletins
		$bulletins = json_decode( file_get_contents( "http://bulletins.discovermass.com/list.php?folder={$bulletinId}&quantity={$quantity}" ) );

		// Loop through the bulletins
		foreach( $bulletins as $date => $bulletin )
		{
			$file = dpi_bulletins_encrypt_link( $bulletinId, $date );
			$label = date( "M j, Y", strtotime( $date ) );
			echo "<a href='$file' target='_blank'>$label</a><br />";
		}
	}

	   echo '</div>';
	   echo $after_widget;
	}
}

// register widget
function register_dpi_bulletins_widget() {
    register_widget( 'dpi_bulletins_widget' );
}
add_action( 'widgets_init', 'register_dpi_bulletins_widget' );

/**
 * Displays the bulletins links
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

function dpi_bulletins_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'id' 	=> false,
			'quantity'	=> false,
			'title' => false,
			'width' 	=> '100%',
			'height' 	=> '400px'
		),
		$atts
	);

	$id = $atts['id'];
	$volume = $atts['quantity'];
	$title = $atts['title'];

	ob_start();

	$bulletinId = get_option( 'dpi_bulletin_id', '555' );
	// Check if id is set
	if( $id ) {
		$bulletinId = esc_attr( $atts['id'] );
	}

	$quantity = get_option( 'dpi_bulletin_quantity', '4' );
	// Check if quantity is set
	if( $volume ) {
		$quantity = esc_attr( $atts['quantity'] );
	}

	// Check if title is set
	if( $title ) {
		$custom = esc_attr( $atts['title'] );
	}

	if( $bulletinId != "555" )
	{
		// Get the list of bulletins
		$bulletins = json_decode( file_get_contents( "http://bulletins.discovermass.com/list.php?folder={$bulletinId}&quantity={$quantity}" ) );

		// Loop through the bulletins
		foreach( $bulletins as $date => $bulletin )
		{
			$file = dpi_bulletins_encrypt_link( $bulletinId, $date );
			$label = ( $custom ) ? $custom : date( "M j, Y", strtotime( $date ) );
			echo "<a href='$file' target='_blank'>$label</a><br />";
		}
	}

	return ob_get_clean();
}
add_shortcode( 'bulletins', 'dpi_bulletins_shortcode' );

add_action( 'admin_menu', 'bulletins_menu' );

function bulletins_menu() {
	add_options_page( 'Bulletins Options', 'Bulletins Plugin', 'manage_options', 'bulletinssettings', 'my_bulletin_options' );
}

// displays the page content for the bulletins settings submenu
function my_bulletin_options() {

    //must check that the user has the required capability
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names
    $opt_name = 'dpi_bulletin_id';
	$opt2_name = 'dpi_bulletin_quantity';
    $hidden_field_name = 'dpi_submit_hidden';
    $data_field_name = 'dpi_bulletin_id';
	$data_field2_name = 'dpi_bulletin_quantity';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt2_val = get_option( $opt2_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
		$opt2_val = $_POST[ $data_field2_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
		update_option( $opt2_name, $opt2_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Your settings have been saved.', 'menu-test' ); ?></strong></p></div>
<?php

    }
?>
	<div class="wrap">
	<div class="icon32" id="icon-options-general"><br></div>

<?php
    // header
    echo "<h2>" . __( 'DPI Bulletins Settings', 'menu-test' ) . "</h2>";

    // settings form

?>
<script>
function validateMyWidgetForm() {
    var msg = "";

    if (document.forms["form1"]["dpi_bulletin_quantity"].value < 1)
        msg = msg + "The value of 'Bulletins' has to be greater than 0.\n";

	if (document.forms["form1"]["dpi_bulletin_id"].value < 1)
        msg = msg + "Bulletin ID is a required field.\n";

    if ("" != msg) {
        alert(msg);
        return false;
    }
    return true;
}

</script>

<form name="form1" method="post" action="" onsubmit="return validateMyWidgetForm()">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Bulletin ID:", 'menu-test' ); ?>
	<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="12" maxlength="8">
</p>
<p><?php _e("Number of Bulletins to display:", 'menu-test' ); ?>
	<input type="text" name="<?php echo $data_field2_name; ?>" value="<?php echo $opt2_val; ?>" size="12" maxlength="1">
</p>

<hr />

<p class="submit">
	<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>

<?php

}

?>
