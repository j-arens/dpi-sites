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
function dpi_bulletins_encrypt_link( $bulletinId, $sunday, $is_pdf ) {
	$bulletinsOnline = "http://bulletins.discovermass.com";
	$timestamp = time();
	$key = pack( "H*", "69F693BA89D7224C932A292D14A6262813DA4B443A95F233DBB25E132B4E7E8F" );
	$key_size  = strlen( $key );
	$iv_size = mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC );
	$iv = mcrypt_create_iv( $iv_size, MCRYPT_RAND );
	$plaintext = "{$bulletinId}|{$sunday}|{$timestamp}";
	$ciphertext = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $key, $plaintext, MCRYPT_MODE_CBC, $iv );
	$ciphertext = rawurlencode( base64_encode( $iv . $ciphertext ) );
	$pdf = ( $is_pdf ) ? "{$bulletinsOnline}/download.php?bulletin={$ciphertext}" : "{$bulletinsOnline}/image.php?bulletin={$ciphertext}";
	return $pdf;
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'link_action_on_plugin' );
function link_action_on_plugin( $links ) {
	return array_merge(array('settings' => '<a href="' . admin_url( '/options-general.php?page=bulletinssettings' ) . '">' . __( 'Settings', 'domain' ) . '</a>'), $links);
}

/**
 * Displays the bulletins links
 *
 * update 10.25.2016 Josh Arens
 *
*/

function dpi_bulletins_shortcode( $atts ) {

  // shortcode params
	$atts = shortcode_atts(
		array(
			'id' 	=> false,
			'quantity'	=> false,
      // 'cycle' => false,
		),
		$atts
	);

  ob_start();

  // set shortcode params
  $bulletin_id = esc_attr( $atts['id'] );
  $volume = esc_attr( $atts['quantity'] );
  // $cycle = esc_attr( $atts['cycle'] );

  if (!$bulletin_id) {
    $bulletin_id = get_option( 'dpi_bulletin_id', '555' );
  };

  if (!$volume) {
    $volume = get_option( 'dpi_bulletin_quantity', '4' );
  };

  // if (!$cycle) {
  //   $cycle = 0;
  // }

  // if valid id, get bulletins
	if( $bulletin_id != "555" ) {
		$bulletins = json_decode( file_get_contents( "http://bulletins.discovermass.com/list.php?folder={$bulletin_id}&quantity={$volume}" ) );
    // $counter = 1;
    // $bulletinList = null;
    $html = '<ul id="bulletin-columns">';

		// put bulletins in an array
		foreach( $bulletins as $date => $bulletin ) {
			$file = dpi_bulletins_encrypt_link( $bulletin_id, $date, true );
    	$image = dpi_bulletins_encrypt_link( $bulletin_id, $date, false );
			$label = date( "M j, Y", strtotime( $date ) );

      // $bulletinList['bulletin_' . $counter] = array(
      //   'file_url' => $file,
      //   'image_url' => $image,
      //   'date' => $label,
      // );

      $html .= '
        <li>
          <a target="_blank" href="' . $file . '">
            <img src="' . $image . '" alt="bulletin" />
          </a>
        </li>
      ';

      // $counter++;
		}

    // reset counter
    // $counter = 0;

    // output html, first li is a cover image then every $cycle of links are wrapped in a li
		// $links = '';
    //
		// do {
    //   // image
    //   if ($counter === 0) {
    //     $bulletin = array_shift($bulletinList);
    //     $html .= '
    //       <li>
    //         <a target="_blank" href="' . $bulletin['file_url'] . '">
    //           <img src="' . $bulletin['image_url'] . '" alt="bulletin" />
    //         </a>
    //       </li>
    //     ';
    //     $counter++;
    //
    //   // wrapper li
    // } else if ( $counter > 1 && ($counter % 4 == 0) ) {
    //     $html .= '<li>' . $links . '</li>';
    //     $links = '';
		// 		$counter++;
    //
    //   // build links
    //   } else {
    //     $bulletin = array_shift($bulletinList);
    //     $links .= '<a target="_blank" href="' . $bulletin['file_url'] . '">' . $bulletin['date'] . '</a>';
		// 		$counter++;
    //   }
		// } while (!empty($bulletinList));


    $html .= '</ul>';
    echo $html;

    return ob_get_clean();
	}
}

add_shortcode( 'bulletins', 'dpi_bulletins_shortcode' );


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

<p>Bulletin Shortcode [bulletins]</p>
<p>Current Bulletin Cover Image Shortcode [bulletin_cover]</p>

</form>
</div>

<?php

}

add_action( 'admin_menu', 'bulletins_menu' );

function bulletins_menu() {
	add_options_page( 'Bulletins Options', 'Bulletins Plugin', 'manage_options', 'bulletinssettings', 'my_bulletin_options' );
}

?>
