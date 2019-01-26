<?php




/**** DPI SITE CUSTOMIZER ****/




// CUSTOMIZER SETUP
class Custom_Options_Page {
	private $settings;
	private $parents;
/**
* Class constructor
*/
	public function __construct() {
		$this->settings_base = 'opt_page_';
    // Initialise settings
  	add_action( 'admin_init', array( $this, 'init' ) );
  	// Register plugin settings
  	add_action( 'admin_init' , array( $this, 'register_settings' ) );
  	// Add settings page to menu
  	add_action( 'admin_menu' , array( $this, 'add_menu_item' ) );
		// Add code to admin head
		add_action( 'admin_head', array( $this, 'user_role' ) );
    // enqueue styles
    add_action( 'admin_enqueue_scripts', array( $this, 'page_styles' ) );
    // enqueue scripts
    add_action( 'admin_enqueue_scripts', array( $this, 'page_scripts' ) );
	}
/**
* Initialise options page model
*/
  public function init() {
    $this->settings = $this->settings_fields();
		$this->parents = $this->site_sections();
  }

/**
* Pass user role capability into global js variable
*/
public function user_role() {
	$user_info = json_encode( get_currentuserinfo() );
	echo '<script> var user = ' . $user_info . ' </script>';
}


/**
* Add settings page to admin menu
*/
  public function add_menu_item() {
    add_menu_page( 'Customizer', 'Customizer', 'moderate_comments', 'customizer', array( $this, 'settings_page' ), 'dashicons-admin-home', 3 );
  }
/**
* Custom options page styles
*/
  public function page_styles() {
    // admin page styles
    wp_register_style('options-page-admin-styles', get_template_directory_uri() . '/admin-styles/opt-page-styles.css', '1.0.0', 'all' );
    wp_enqueue_style('options-page-admin-styles');
    // farbtastic
    wp_enqueue_style( 'farbtastic' );
  }
/**
* Custom options page scripts
*/
  public function page_scripts() {
    // media picker
    wp_enqueue_media();
    // opt page script
    wp_register_script( 'options-page-admin-js', get_template_directory_uri() . '/js/settings.js', array( 'farbtastic', 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'options-page-admin-js' );
	}

// MODEL AND REGISTER DATA

/**
* Model of editable site sections
*/
private function site_sections() {
	$parents = array(
		'splash page',
	);
	return $parents;
}
/**
* Model of components and fields
*/
private function settings_fields() {

  $settings['header'] = array(
		'parent' => 'splash page',
		'title' => 'Header',
		'description' => '',
		'sections' => array(
			'logo',
		),
		'fields' => array(
			array(
				'parent' => 'logo', // containing component
				'id' => 'header_logo_image_upload_0', // id
				'label' => 'Page logo', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

  $settings['Site Info'] = array(
		'parent' => 'splash page',
		'title' => 'Site Info',
		'description' => '',
		'sections' => array(
			'Mass Times',
      'Confession',
      'Office Hours',
		),
		'fields' => array(
			array(
				'parent' => 'Mass Times', // containing component
				'id' => 'site_info_mass_times_text_area_1', // id
				'label' => 'Mass Times Info', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Confession', // containing component
				'id' => 'site_info_confession_text_area_2', // id
				'label' => 'Confession Info', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Office Hours', // containing component
				'id' => 'site_info_office_hours_text_area_3', // id
				'label' => 'Office Hours', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

  $settings['Link Boxes'] = array(
		'parent' => 'splash page',
		'title' => 'Link Boxes',
		'description' => '',
		'sections' => array(
			'Link Box 1',
      'Link Box 2',
		),
		'fields' => array(
			array(
				'parent' => 'Link Box 1', // containing component
				'id' => 'link_boxes_link_box_1_image_upload_4', // id
				'label' => 'Link Image', // title of the input
				'description' => 'Link Image', // descrip of the input
				'type' => 'image', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
      array(
				'parent' => 'Link Box 1', // containing component
				'id' => 'link_boxes_link_box_1_text_5', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 1', // containing component
				'id' => 'link_boxes_link_box_1_text_6', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 1', // containing component
				'id' => 'link_boxes_link_box_1_text_7', // id
				'label' => 'Address', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 1', // containing component
				'id' => 'link_boxes_link_box_1_text_8', // id
				'label' => 'Phone Number', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 2', // containing component
				'id' => 'link_boxes_link_box_2_image_upload_9', // id
				'label' => 'Link Image', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
      array(
				'parent' => 'Link Box 2', // containing component
				'id' => 'link_boxes_link_box_2_text_10', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 2', // containing component
				'id' => 'link_boxes_link_box_2_text_11', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 2', // containing component
				'id' => 'link_boxes_link_box_2_text_12', // id
				'label' => 'Address', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link Box 2', // containing component
				'id' => 'link_boxes_link_box_2_text_13', // id
				'label' => 'Phone Number', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

  $settings['footer'] = array(
		'parent' => 'splash page',
		'title' => 'Footer',
		'description' => '',
		'sections' => array(
			'Info',
		),
		'fields' => array(
			array(
				'parent' => 'Info', // containing component
				'id' => 'footer_info_text_14', // id
				'label' => 'Church Name', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	return $settings;
}
/**
* Register plugin settings
*/
public function register_settings() {
		if( is_array( $this->settings ) ) {
			// get fields
			foreach( $this->settings as $section => $data ) {
				foreach( $data['fields'] as $field ) {
					// Validation callback for field
					$sanitize = '';
					if( isset( $field['callback'] ) ) {
						$sanitize = $field['callback'];
					}
					// Register field
					$option_name = $this->settings_base . $field['id'];
					register_setting( 'plugin_settings', $option_name, $sanitize );
					// Add field to page
					add_settings_field( $field['id'], $field['label'], array( $this, 'display_field' ), 'plugin_settings', $section, array( 'field' => $field ) );
				}
			}
		}
	}
// HTML OUTPUT
/**
* Generate HTML for displaying fields
*/
public function display_field( $fields_arr ) {
		$html = '';
		$option_name = $this->settings_base . $fields_arr['id'];
		$option = get_option( $option_name );
		$data = '';
		$type = $fields_arr['type'];
		// get the value of default if it exists
		if( isset( $fields_arr['default'] ) ) {
			$data = $fields_arr['default'];
			if( $option ) {
				$data = $option;
			}
		}
		switch( $type ) {
			case 'text':
			case 'password':
			case 'number':
				$html .= '<span class="piece-title">' . $fields_arr['label'] . '</span><input id="' . esc_attr( $fields_arr['id'] ) . '" type="' . $fields_arr['type'] . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $fields_arr['placeholder'] ) . '" value="' . $data . '"/>';
			break;
			case 'text_secret':
				$html .= '<input id="' . esc_attr( $fields_arr['id'] ) . '" type="text" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $fields_arr['placeholder'] ) . '" value=""/>';
			break;
			case 'textarea':
				$html .= '<span class="piece-title">' . $fields_arr['label'] . '</span><textarea id="' . esc_attr( $fields_arr['id'] ) . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $fields_arr['placeholder'] ) . '">' . $data . '</textarea><br/>';
			break;
			case 'checkbox':
				$checked = '';
				if( $option && 'on' == $option ){
					$checked = 'checked="checked"';
				}
				$html .= '<input id="' . esc_attr( $fields_arr['id'] ) . '" type="' . $fields_arr['type'] . '" name="' . esc_attr( $option_name ) . '" ' . $checked . '/>';
			break;
			case 'checkbox_multi':
				foreach( $fields_arr['options'] as $k => $v ) {
					$checked = false;
					if( in_array( $k, $data ) ) {
						$checked = true;
					}
					$html .= '<label for="' . esc_attr( $fields_arr['id'] . '_' . $k ) . '"><input type="checkbox" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '[]" value="' . esc_attr( $k ) . '" id="' . esc_attr( $fields_arr['id'] . '_' . $k ) . '" /> ' . $v . '</label> ';
				}
			break;
			case 'radio':
				foreach( $fields_arr['options'] as $k => $v ) {
					$checked = false;
					if( $k == $data ) {
						$checked = true;
					}
					$html .= '<label for="' . esc_attr( $fields_arr['id'] . '_' . $k ) . '"><input type="radio" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '" value="' . esc_attr( $k ) . '" id="' . esc_attr( $fields_arr['id'] . '_' . $k ) . '" /> ' . $v . '</label> ';
				}
			break;
			case 'select':
				$html .= '<span class="piece-title">' . $fields_arr['label'] . '</span>';
				$html .= '<select name="' . esc_attr( $option_name ) . '" id="' . esc_attr( $fields_arr['id'] ) . '">';
				$select_count = 0;
				foreach( $fields_arr['options'] as $k => $v ) {
					$selected = false;
					if( $k == $data ) {
						$selected = true;
					} else if ($select_count === 0) {
						$selected = true;
					}
					$html .= '<option ' . selected( $selected, true, false ) . ' value="' . esc_attr( $k ) . '">' . $v . '</option>';
					$select_count++;
				}
				$html .= '</select> ';
			break;
			case 'select_multi':
				$html .= '<select name="' . esc_attr( $option_name ) . '[]" id="' . esc_attr( $fields_arr['id'] ) . '" multiple="multiple">';
				foreach( $field['options'] as $k => $v ) {
					$selected = false;
					if( in_array( $k, $data ) ) {
						$selected = true;
					}
					$html .= '<option ' . selected( $selected, true, false ) . ' value="' . esc_attr( $k ) . '" />' . $v . '</label> ';
				}
				$html .= '</select> ';
			break;
			case 'image':
				$image_thumb = '';
				if( $data ) {
					$image_thumb = wp_get_attachment_thumb_url( $data );
				}
				$html .= '<span class="piece-title">' . $fields_arr['label'] . '</span>';
				$html .= '<img id="' . $option_name . '_preview" class="image_preview" src="' . $image_thumb . '" />';
				$html .= '<input id="' . $option_name . '_button" type="button" data-uploader_title="Upload an image" data-uploader_button_text="Use image" class="image_upload_button button" value="Upload new image" />';
				$html .= '<input id="' . $option_name . '_delete" type="button" class="image_delete_button button" value="Remove image" />';
				$html .= '<input id="' . $option_name . '" class="image_data_field" type="hidden" name="' . $option_name . '" value="' . $data . '"/>';
			break;
			case 'color':
				?>
					<span class="description"><?php echo $fields_arr['description']; ?></span>
					<div class="color-picker" style="position:relative;">
		        <input type="text" name="<?php esc_attr_e( $option_name ); ?>" class="color" value="<?php esc_attr_e( $data ); ?>" />
		        <div class="colorpicker"></div>
		    	</div>

		    <?php
			break;
		}
		switch( $type ) {
			case 'checkbox_multi':
			case 'radio':
			case 'select_multi':
				$html .= '<br/><span class="description">' . $fields_arr['description'] . '</span>';
			break;
		}
		echo $html;
	}
/**
* Generate HTML for sidebar sections nav
*/
	private function build_sections_nav() {
		// icon
		$svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" width="512" height="512"><path d="M150 0C67.2 0 0 67.2 0 150S67.2 300 150 300s150-67.2 150-150S232.8 0 150 0zM221.3 107.9l-14.2 14.2 -29-29 -11 11 29 29 -71.1 71.1 -29-29L84.9 186.3l29 29 -7.1 7.1 -0.1-0.1c-0.8 1.3-2.1 2.2-3.6 2.6l-27 6c-0.4 0.1-0.8 0.1-1.2 0.1 -1.5 0-2.9-0.6-4-1.6 -1.4-1.4-1.9-3.3-1.5-5.2l6-27c0.3-1.5 1.3-2.8 2.6-3.6l-0.1-0.1L192.3 78.9c1.7-1.7 4.4-1.7 6.1 0l22.9 22.9C223 103.5 223 106.3 221.3 107.9z"/></svg>';
		$html = '<nav class="site-section-nav">';
		$html .= '<div class="promo-section"><h1>Customizer</h1></div>';
		$html .= '<span class="nav-title">Sections</span>';
		$html .= '<ul>';
		foreach($this->parents as $i => $section) {
			if ($i === 0) {
				$html .= '<li class="active-tab">' . $svg . $section . '</li>';
			} else {
				$html .= '<li>' . $svg . $section . '</li>';
			}
		}
		$html .= '</ul>';
		$html .= '</nav>';
		return $html;
}
/**
* Generate HTML for componets
*/
private function build_componets() {
	$count = 0;
	foreach($this->parents as $site_part) {
		$count_comp = 0;

		if ($count === 0) {
			echo '<div class="active-section site-section ' . $site_part . '-container">';
		} else {
			echo '<div class="site-section ' . $site_part . '-container">';
		}
		$this->build_tabs_nav($site_part);
		echo '<ul class="tab-panel section-' . $site_part . '">';
		foreach($this->settings as $component) {
			if ($component['parent'] === $site_part) {
				if ($count_comp === 0) {
					echo '<li class="active-component component ' . strtolower(preg_replace('/\s+/', '-', $component['title'])) . '">';
					$count_comp++;
				} else {
					echo '<li class="component ' . strtolower(preg_replace('/\s+/', '-', $component['title'])) . '">';
				}
				$this->build_component_part($component);
				echo '</li>';
			}
			$count++;
		}
		echo '</ul>';
		echo '</div>';
	}
}
/**
* Generate HTML for the tab nav
*/
  private function build_tabs_nav($site_part) {
    $html = '<nav class="tab-nav"><ul>';
		$i = 0;
    foreach( $this->settings as $section => $data ) {
			if ($data['parent'] === $site_part) {
				if ($i === 0) {
					$html .= '<li class="active-part">' . $data['title'] . '</li>';
				} else {
					$html .= '<li>' . $data['title'] . '</li>';
				}
				$i++;
			}
    }
    $html .= '</ul></nav>';
    echo $html;
  }
/**
* Generate HTML for component parts
*/
private function build_component_part($comp_arr) {
	foreach($comp_arr['sections'] as $component_part) {
		echo '<div class="input-wrapper">';
		echo '<span class="component-title">' . $component_part , '</span>';
		foreach($comp_arr['fields'] as $fields) {
			if ($fields['parent'] === $component_part) {
				$this->display_field($fields);
			}
		}
		echo '</div>';
	}
}
/**
* Build settings page
*/
  public function settings_page() {
     // Build page HTML
    $html = '<div id="dpi-opt-page">';
		$html .= $this->build_sections_nav();
		// begin form
    $html .= '<form class="opt-page-form" method="post" action="options.php" enctype="multipart/form-data">';
		$html .= '<nav class="top-nav"></nav>';
    // Get settings fields
		ob_start();
    echo '<div class="tab-panel-container">';
    settings_fields( 'plugin_settings' );
		$this->build_componets();
    echo '</div>';
    $html .= ob_get_clean();
    // submit and closing tags
    $html .= '<div class="submit-form">';
    $html .= '<input name="Submit" type="submit" class="submit-btn" value="Save Settings" />' . "\n";
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    echo $html;
  }
}

if ( is_admin() )
	$homepage_customizer_opt = new Custom_Options_Page();

function opt_page_sanitize_text_input($input) {
	$output = sanitize_text_field($input);
	return $output;
}


/**** WIDGET AREAS ****/




//create new widget area
function dpi_create_widget_area( $name, $id, $description, $className) {

  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __($description),
    'before_widget' => '<div class="' . $className . '">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="' . $className . '-title">',
    'after_title' => '</h3>'
  ));
}

dpi_create_widget_area('Footer', 'footer_widget', 'Footer widget area.', 'footer-widget');

/**
* usage: <?php dynamic_sidebar( 'sidebar-id' ); ?>
*/



/**** OTHER MODIFICATIONS ****/




// custom excerpt length
function custom_excerpt_length( $length ) {
	global $post;
		return 55; //default is 55
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// modify read more link on excerpts
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//DPI Column Shortcode
function dpi_column_shortcode($atts, $content, $tag){

    // Attributes
	extract( shortcode_atts(
		array(
			'width' => '',
		), $atts )
	);

	$output = '<div class="dpi-column-' . $width . '">' .
        do_shortcode($content) .
        '</div>';

	return $output;

}
add_shortcode('column','dpi_column_shortcode');

// stop wordpress from resizing featured images/Thumbnails
function remove_thumbnail_resize() {
  remove_image_size('thumbnail');
}
add_action('init', 'remove_thumbnail_resize');


/**** SITE SETUP ****/




/**
 * dpi-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dpi-theme
 */

if ( ! function_exists( 'dpi_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dpi_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dpi-theme, use a find and replace
	 * to change 'dpi-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dpi-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'dpi-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dpi_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'dpi_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dpi_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dpi_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'dpi_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dpi_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dpi-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dpi-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dpi_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 function dpi_theme_scripts() {
 	wp_enqueue_style( 'dpi-theme-style', get_stylesheet_uri() );
 }

 add_action( 'wp_enqueue_scripts', 'dpi_theme_scripts' );

 /**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

// remove ie css from twentytwelve theme
function diocesan_ie_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie_dequeue_styles', 11 );

// remove ie css from twentytwelve theme
function diocesan_ie8_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie8' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie8_dequeue_styles', 11 );

// remove ie css from twentytwelve theme
function diocesan_ie7_dequeue_styles() {
    wp_dequeue_style( 'twentysixteen-ie7' );
 }
 add_action( 'wp_enqueue_scripts', 'diocesan_ie7_dequeue_styles', 11 );

//add new from child theme
wp_enqueue_style( 'diocesan-ie', get_stylesheet_directory_uri() . '/ie.css', array( 'twentysixteen-style' ), '1.0' );
$wp_styles->add_data( 'diocesan-ie', 'conditional', 'lt IE 9' );
