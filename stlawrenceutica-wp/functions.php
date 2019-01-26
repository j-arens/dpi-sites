<?php




/**** CUSTOM WP DASHBOARD PAGE ****/




if ( ! defined( 'ABSPATH' ) ) exit;
class WordPress_Plugin_Template_Settings {

  // constructor function
	public function __construct( $file ) {

  	$this->settings_base = 'opt_page_';

  	// Initialise settings
  	add_action( 'admin_init', array( $this, 'init' ) );
  	// Register plugin settings
  	add_action( 'admin_init' , array( $this, 'register_settings' ) );
  	// Add settings page to menu
  	add_action( 'admin_menu' , array( $this, 'add_menu_item' ) );
    // enqueue styles
    add_action( 'admin_enqueue_scripts', array( $this, 'page_styles' ) );
    // enqueue scripts
    add_action( 'admin_enqueue_scripts', array( $this, 'page_scripts' ) );
	}


	/**
	 * Initialise settings
	 */
	public function init() {
	   $this->settings = $this->settings_fields();
	}


	/**
	 * Add settings page to admin menu
	 */
  public function add_menu_item() {
    add_menu_page( 'Homepage Customizer', 'Homepage Customizer', 'manage_options', 'homepage_customizer', array( $this, 'settings_page' ), 'dashicons-admin-home', 3 );
  }

  public function page_styles() {
    // admin page styles
    wp_register_style('options-page-admin-styles', get_template_directory_uri() . '/admin-styles/opt-page-styles.css', '1.0.0', 'all' );
    wp_enqueue_style('options-page-admin-styles');
    // farbtastic
    wp_enqueue_style( 'farbtastic' );
  }

  public function page_scripts() {
    // color picker
    wp_enqueue_script( 'farbtastic' );
    // media picker
    wp_enqueue_media();
    // opt page script
    wp_register_script( 'options-page-admin-js', get_template_directory_uri() . '/js/settings.js', array( 'farbtastic', 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'options-page-admin-js' );
	}

	/**
	 * Build settings fields
	 */
	private function settings_fields() {
  	$settings['Mission Statement'] = array(
    	'title'	=> 'Mission Statement',
    	'description'	=> 'Homepage Mission Statement',
    	'fields'	=> array(
      	array(
      	'id' 	=> 'mission_statement_text_field_0', // id
      	'label'	=> 'Title', // title
      	'description'	=> 'Title of the Mission Statement', // description
      	'type'	=> 'text', // settings field type DO NOT CHANGE
      	'default'	=> 'Mission Statement', // default value of the input
      	'placeholder'	=> '' // input el placeholder text
      	),
      	array(
      	'id' 	=> 'mission_statement_textarea_1', // id
      	'label'	=> 'Content', // title
      	'description'	=> __( 'This is a standard text area.', 'plugin_textdomain' ), // description
      	'type'	=> 'textarea', // settings field type DO NOT CHANGE
      	'default'	=> '', // default input value
      	'placeholder'	=> '' // placeholder text
        ),
        array(
        'id' 	=> 'mission_statement_text_field_2', // id
        'label'	=> 'Link Title', // title
        'description'	=> 'Link button text', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Join Our Parish', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'mission_statement_text_field_3', // id
        'label'	=> 'Link URL', // title
        'description'	=> 'Link URL', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> 'Paste address here' // input el placeholder text
      ),
  	)
	);
	$settings['Small Link Box'] = array(
  	'title'	=> 'Small Link Box',
  	'description'	=> 'First small link box on the homepage',
  	'fields'	=> array(
      array(
    	'id' 	=> 'small_link_box_0_bg_image_0',
    	'label'	=> 'Background Image',
    	'description'	=> 'Background image of the link box',
    	'type'	=> 'image',
    	'default'	=> '',
    	'placeholder'	=> ''
    	),
      array(
    	'id' 	=> 'small_link_color_picker_0',
    	'label'	=> 'Overlay Color',
    	'description'	=> '',
    	'type'	=> 'color',
    	'default'	=> '#d9a721'
    	),
      array(
    	'id' 	=> 'small_link_box_0_icon_image_1',
    	'label'	=> 'Icon',
    	'description'	=> 'Link box icon',
    	'type'	=> 'image',
    	'default'	=> '',
    	'placeholder'	=> ''
    	),
      array(
      'id' 	=> 'small_link_box_0_title_2', // id
      'label'	=> 'Link box title', // title
      'description'	=> 'Title of the link box', // description
      'type'	=> 'text', // settings field type DO NOT CHANGE
      'default'	=> 'Mass Times', // default value of the input
      'placeholder'	=> 'Paste address here' // input el placeholder text
      ),
			array(
			'id' 	=> 'small_link_box_0_text_10', // id
			'label'	=> 'Day', // title
			'description'	=> '', // description
			'type'	=> 'text', // settings field type DO NOT CHANGE
			'default'	=> '', // default value of the input
			'placeholder'	=> '' // input el placeholder text
			),
			array(
			'id' 	=> 'small_link_box_0_textarea_11', // id
			'label'	=> 'Time', // title
			'description'	=> '', // description
			'type'	=> 'textarea', // settings field type DO NOT CHANGE
			'default'	=> '', // default value of the input
			'placeholder'	=> '' // input el placeholder text
			),
			array(
			'id' 	=> 'small_link_box_0_text_12', // id
			'label'	=> 'Day', // title
			'description'	=> '', // description
			'type'	=> 'text', // settings field type DO NOT CHANGE
			'default'	=> '', // default value of the input
			'placeholder'	=> '' // input el placeholder text
			),
			array(
			'id' 	=> 'small_link_box_0_textarea_13', // id
			'label'	=> 'Time', // title
			'description'	=> '', // description
			'type'	=> 'textarea', // settings field type DO NOT CHANGE
			'default'	=> '', // default value of the input
			'placeholder'	=> '' // input el placeholder text
		),
      array(
      'id' 	=> 'small_link_box_0_text_4', // id
      'label'	=> 'Button Title', // title
      'description'	=> 'Title of the link box button', // description
      'type'	=> 'text', // settings field type DO NOT CHANGE
      'default'	=> 'Full Schedule', // default value of the input
      'placeholder'	=> '' // input el placeholder text
      ),
      array(
      'id' 	=> 'small_link_box_0_text_5', // id
      'label'	=> 'Button Link', // title
      'description'	=> 'Address of the page to go to when clicking button', // description
      'type'	=> 'text', // settings field type DO NOT CHANGE
      'default'	=> '', // default value of the input
      'placeholder'	=> '' // input el placeholder text
      ),
  	)
	);
	$settings['Small Link Box 2'] = array(
  	'title'	=> 'Small Link Box',
  	'description'	=> 'Second small link box on the homepage',
  	'fields'	=> array(
        array(
      	'id' 	=> 'small_link_box_1_bg_image_0',
      	'label'	=> 'Background Image',
      	'description'	=> 'Background image of the link box',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
      	'id' 	=> 'small_link_box_1_color_picker_1',
      	'label'	=> 'Overlay Color',
      	'description'	=> '',
      	'type'	=> 'color',
      	'default'	=> '#002449'
      	),
        array(
      	'id' 	=> 'small_link_box_1_icon_image_2',
      	'label'	=> 'Icon',
      	'description'	=> 'Link box icon',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
        'id' 	=> 'small_link_box_1_title_3', // id
        'label'	=> 'Link box title', // title
        'description'	=> 'Title of the link box', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Mass Times', // default value of the input
        'placeholder'	=> 'Paste address here' // input el placeholder text
        ),
        array(
      	'id' 	=> 'small_link_box_1_textarea_4', // id
      	'label'	=> 'Content', // title
      	'description'	=> '', // description
      	'type'	=> 'textarea', // settings field type DO NOT CHANGE
      	'default'	=> '', // default input value
      	'placeholder'	=> '' // placeholder text
        ),
        array(
        'id' 	=> 'small_link_box_1_text_5', // id
        'label'	=> 'Button Title', // title
        'description'	=> 'Title of the link box button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Full Schedule', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'small_link_box_1_text_6', // id
        'label'	=> 'Button Link', // title
        'description'	=> 'Address of the page to go to when clicking button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
  	)
	);
	$settings['Large Link Box 2'] = array(
    	'title'	=> 'Large Link Box',
    	'description'	=> 'Large link box on the homepage',
    	'fields'	=> array(
        array(
      	'id' 	=> 'large_link_box_0_bg_image_0',
      	'label'	=> 'Background Image',
      	'description'	=> 'Background image of the link box',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
      	'id' 	=> 'large_link_box_0_color_picker_1',
      	'label'	=> 'Overlay Color',
      	'description'	=> '',
      	'type'	=> 'color',
      	'default'	=> '#898989'
      	),
        array(
      	'id' 	=> 'large_link_box_0_icon_image_2',
      	'label'	=> 'Icon',
      	'description'	=> 'Link box icon',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
        'id' 	=> 'large_link_box_0_title_3', // id
        'label'	=> 'Link box title', // title
        'description'	=> 'Title of the link box', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Mass Times', // default value of the input
        'placeholder'	=> 'Paste address here' // input el placeholder text
        ),
        array(
        'id' 	=> 'large_link_box_0_text_5', // id
        'label'	=> 'Button Title', // title
        'description'	=> 'Title of the link box button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Full Schedule', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'large_link_box_0_text_6', // id
        'label'	=> 'Button Link', // title
        'description'	=> 'Address of the page to go to when clicking button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> '' // input el placeholder text
      ),
  	)
	);
	$settings['Icon Box 0'] = array(
    	'title'	=> 'Icon Box',
    	'description'	=> 'Icon box on the homepage',
    	'fields'	=> array(
        array(
      	'id' 	=> 'icon_box_0_icon_0',
      	'label'	=> 'Icon',
      	'description'	=> '',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
        'id' 	=> 'icon_box_0_text_1', // id
        'label'	=> 'Icon box title', // title
        'description'	=> 'Title of the link box', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Ministries', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
      	'id' 	=> 'icon_box_0_textarea_2', // id
      	'label'	=> 'Content', // title
      	'description'	=> 'Text to go in the link box', // description
      	'type'	=> 'textarea', // settings field type DO NOT CHANGE
      	'default'	=> '', // default input value
      	'placeholder'	=> '' // placeholder text
      ),
        array(
        'id' 	=> 'icon_box_0_text_3', // id
        'label'	=> 'Button Title', // title
        'description'	=> 'Title of the icon box button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'View Ministries', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'icon_box_0_text_4', // id
        'label'	=> 'Button Link', // title
        'description'	=> 'Address of the page to go to when clicking button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> '' // input el placeholder text
      ),
  	)
	);
	$settings['Icon Box 1'] = array(
  	'title'	=> 'Icon Box',
  	'description'	=> 'Icon box on the homepage',
  	'fields'	=> array(
        array(
      	'id' 	=> 'icon_box_1_icon_0',
      	'label'	=> 'Icon',
      	'description'	=> '',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
        'id' 	=> 'icon_box_1_text_1', // id
        'label'	=> 'Icon box title', // title
        'description'	=> 'Title of the link box', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'About Our Parish', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
      	'id' 	=> 'icon_box_1_textarea_2', // id
      	'label'	=> 'Content', // title
      	'description'	=> 'Text to go in the link box', // description
      	'type'	=> 'textarea', // settings field type DO NOT CHANGE
      	'default'	=> '', // default input value
      	'placeholder'	=> '' // placeholder text
      ),
        array(
        'id' 	=> 'icon_box_1_text_3', // id
        'label'	=> 'Button Title', // title
        'description'	=> 'Title of the icon box button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Learn More', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'icon_box_1_text_4', // id
        'label'	=> 'Button Link', // title
        'description'	=> 'Address of the page to go to when clicking button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> '' // input el placeholder text
      ),
  	)
	);
	$settings['Icon Box 2'] = array(
    	'title'	=> 'Icon Box',
    	'description'	=> 'Icon box on the homepage',
    	'fields'	=> array(
        array(
      	'id' 	=> 'icon_box_2_icon_0',
      	'label'	=> 'Icon',
      	'description'	=> '',
      	'type'	=> 'image',
      	'default'	=> '',
      	'placeholder'	=> ''
      	),
        array(
        'id' 	=> 'icon_box_2_text_1', // id
        'label'	=> 'Icon box title', // title
        'description'	=> 'Title of the link box', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'St. Lawrence School', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
      	'id' 	=> 'icon_box_2_textarea_2', // id
      	'label'	=> 'Content', // title
      	'description'	=> 'Text to go in the link box', // description
      	'type'	=> 'textarea', // settings field type DO NOT CHANGE
      	'default'	=> '', // default input value
      	'placeholder'	=> '' // placeholder text
      ),
        array(
        'id' 	=> 'icon_box_2_text_3', // id
        'label'	=> 'Button Title', // title
        'description'	=> 'Title of the icon box button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> 'Visit School', // default value of the input
        'placeholder'	=> '' // input el placeholder text
        ),
        array(
        'id' 	=> 'icon_box_2_text_4', // id
        'label'	=> 'Button Link', // title
        'description'	=> 'Address of the page to go to when clicking button', // description
        'type'	=> 'text', // settings field type DO NOT CHANGE
        'default'	=> '', // default value of the input
        'placeholder'	=> '' // input el placeholder text
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
      // $section => $data is just renaming of $this->settings and converting to an array?
    	foreach( $this->settings as $section => $data ) {
      	// Add section to page
      	add_settings_section( $section, $data['title'], array( $this, 'settings_section' ), 'plugin_settings' );
      	foreach( $data['fields'] as $field ) {
        	// Validation callback for field
        	$validation = '';
        	if( isset( $field['callback'] ) ) {
        	$validation = $field['callback'];
        	}
        	// Register field
        	$option_name = $this->settings_base . $field['id'];
        	register_setting( 'plugin_settings', $option_name, $validation );
        	// Add field to page
        	add_settings_field( $field['id'], $field['label'], array( $this, 'display_field' ), 'plugin_settings', $section, array( 'field' => $field ) );
      	}
    	}
  	}
	}


// public function settings_section( $section ) {
//   $html = '<h3> ' . $this->settings[ $section['id'] ]['description'] . '</h3>' . "\n";
//   echo $html;
// }
	/**
	 * Generate HTML for displaying fields
	 */
	public function display_field( $args ) {
  	$field = $args['field'];
  	$html = '';
  	$option_name = $this->settings_base . $field['id'];
  	$option = get_option( $option_name );
  	$data = '';

  	if( isset( $field['default'] ) ) {
  	   $data = $field['default'];
  	    if( $option ) {
  	       $data = $option;
  	      }
  	}

  	switch( $field['type'] ) {
    	case 'text':
    	case 'password':
    	case 'number':
      	$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . $field['type'] . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" value="' . $data . '"/>' . "\n";
    	break;

    	case 'text_secret':
      	$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="text" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" value=""/>' . "\n";
    	break;

    	case 'textarea':
      	$html .= '<textarea id="' . esc_attr( $field['id'] ) . '" rows="5" cols="50" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '">' . $data . '</textarea><br/>'. "\n";
    	break;

    	case 'checkbox':
      	$checked = '';

      	if( $option && 'on' == $option ){
      	   $checked = 'checked="checked"';
      	}

      	$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . $field['type'] . '" name="' . esc_attr( $option_name ) . '" ' . $checked . '/>' . "\n";
    	break;

    	case 'checkbox_multi':
      	foreach( $field['options'] as $k => $v ) {
        	$checked = false;

        	if( in_array( $k, $data ) ) {
        	   $checked = true;
        	}

        	$html .= '<label for="' . esc_attr( $field['id'] . '_' . $k ) . '"><input type="checkbox" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '[]" value="' . esc_attr( $k ) . '" id="' . esc_attr( $field['id'] . '_' . $k ) . '" /> ' . $v . '</label> ';
      	}
    	break;

    	case 'radio':
      	foreach( $field['options'] as $k => $v ) {
        	$checked = false;

        	if( $k == $data ) {
        	   $checked = true;
        	}

        	$html .= '<label for="' . esc_attr( $field['id'] . '_' . $k ) . '"><input type="radio" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '" value="' . esc_attr( $k ) . '" id="' . esc_attr( $field['id'] . '_' . $k ) . '" /> ' . $v . '</label> ';
      	}
    	break;

    	case 'select':
      	$html .= '<select name="' . esc_attr( $option_name ) . '" id="' . esc_attr( $field['id'] ) . '">';
      	foreach( $field['options'] as $k => $v ) {
        	$selected = false;

        	if( $k == $data ) {
        	   $selected = true;
        	}

        	$html .= '<option ' . selected( $selected, true, false ) . ' value="' . esc_attr( $k ) . '">' . $v . '</option>';
      	}
      	$html .= '</select> ';
    	break;

    	case 'select_multi':
      	$html .= '<select name="' . esc_attr( $option_name ) . '[]" id="' . esc_attr( $field['id'] ) . '" multiple="multiple">';
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

      	$html .= '<img id="' . $option_name . '_preview" class="image_preview" src="' . $image_thumb . '" /><br/>' . "\n";
      	$html .= '<input id="' . $option_name . '_button" type="button" data-uploader_title="' . __( 'Upload an image' , 'plugin_textdomain' ) . '" data-uploader_button_text="' . __( 'Use image' , 'plugin_textdomain' ) . '" class="image_upload_button button" value="'. __( 'Upload new image' , 'plugin_textdomain' ) . '" />' . "\n";
      	$html .= '<input id="' . $option_name . '_delete" type="button" class="image_delete_button button" value="'. __( 'Remove image' , 'plugin_textdomain' ) . '" />' . "\n";
      	$html .= '<input id="' . $option_name . '" class="image_data_field" type="hidden" name="' . $option_name . '" value="' . $data . '"/><br/>' . "\n";
    	break;

    	case 'color':
      	?><div class="color-picker" style="position:relative;">
  	        <input type="text" name="<?php esc_attr_e( $option_name ); ?>" class="color" value="<?php esc_attr_e( $data ); ?>" />
  	        <div style="position:absolute;background:#FFF;z-index:99;border-radius:100%;" class="colorpicker"></div>
    	    </div>
  	    <?php
    	break;
  	}

  	switch( $field['type'] ) {
  	case 'checkbox_multi':
  	case 'radio':
  	case 'select_multi':
  	 $html .= '<br/><span class="description">' . $field['description'] . '</span>';
  	break;

  	default:
  	 $html .= '<label for="' . esc_attr( $field['id'] ) . '"><span class="description">' . $field['description'] . '</span></label>' . "\n";
  	break;
  	}
  	echo $html;
	}

	/**
	 * Validate individual settings field
	 */
	public function validate_field( $data ) {

  	if( $data && strlen( $data ) > 0 && $data != '' ) {
  	   $data = urlencode( strtolower( str_replace( ' ' , '-' , $data ) ) );
  	}

  	return $data;
	}

	/**
	 * Load settings page content
	 */
	public function settings_page() {
	   // Build page HTML
  	$html = '<div class="wrap" id="opt_page_settings">' . "\n";

    // this is the title of options page
  	// $html .= '<h1>Options Page</h1>' . "\n";
  	$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

  	// // Setup navigation
  	// $html .= '<ul id="settings-sections" class="subsubsub hide-if-no-js">' . "\n";
  	// // $html .= '<li><a class="tab all current" href="#all">' . __( 'All' , 'plugin_textdomain' ) . '</a></li>' . "\n";
  	// foreach( $this->settings as $section => $data ) {
  	//    $html .= '<li><a class="tab" href="#' . $section . '">' . $data['title'] . '</a></li>' . "\n";
  	// }
  	// $html .= '</ul>' . "\n";
  	// $html .= '<div class="clear"></div>' . "\n";

    $html .= '<ul class="settings-container">';

  	// Get settings fields
  	ob_start();

  	settings_fields( 'plugin_settings' );

    // does the h3 titles and wraps settings in table
  	do_settings_sections( 'plugin_settings' );

    $html .= '</ul>';

  	$html .= ob_get_clean();
  	$html .= '<p class="submit">' . "\n";
  	$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr( __( 'Save Settings' , 'plugin_textdomain' ) ) . '" />' . "\n";
  	$html .= '</p>' . "\n";
  	$html .= '</form>' . "\n";
  	$html .= '</div>' . "\n";

  	echo $html;
	}
}

if ( is_admin() )
	$homepage_customizer_opt = new WordPress_Plugin_Template_Settings();




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




/**** HOMEPAGE POSTS ****/




// being used to add event posts to homepage large link box

function dpi_homepage_post() {
  // the query
  $the_query = new WP_Query( array( 'category_name' => 'events', 'posts_per_page' => 1 ) );

  // nav output
  if ( $the_query->have_posts() ) {
    $template = '<div class="homepage-post">';
  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();

        $template .= '<h1 class="white-text">' . get_the_title() . '</h1>';
        $template .= '<p class="white-text">' . get_the_date() . '</p>';
        $template .= '<p class="white-text">' . get_the_content() . '</p>';

  		}
    $template.= '</div>';
  	} else {
  	// no posts found
  }

  return $template;
  /* Restore original Post Data */
  wp_reset_postdata();
}
// Add a shortcode
add_shortcode('homepage-post', 'dpi_homepage_post');




/**** EVENTS POSTS ****/

// being used in the sidebar

// create custom post category
function create_event_cat() {
  $tab_panel_post_category = array(
    'cat_name' => 'Events',
    'category_description' => 'Posts in this category will be displayed as an event.',
    'category_nicename' => 'events',
    'category_parent' => ''
  );

  wp_insert_category( $tab_panel_post_category );
}

add_action('admin_init', 'create_event_cat');



function dpi_event_posts() {
  // the query
  $the_query = new WP_Query( array( 'category_name' => 'events', 'posts_per_page' => 3 ) );

  // nav output
  if ( $the_query->have_posts() ) {
    $template = '<ul class="event-posts">';
  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();

				$template .= '<li class="event">';
				$template .= '<a href="' . get_permalink() . '">';
				$template .= '<p class="title"><strong>' . get_the_title() . '</strong></p>';
				$template .= '<p class="data">' . get_the_date() . '</p>';
				$template .= '</a>';
				$template .= '</li>';

  		}
    $template .= '</ul>';
		$template .= '<a class="btn-medium btn-link" href="' . get_home_url() . '/?page_id=211">View All Events</a>';
  	} else {
  	// no posts found
  }

  return $template;
  /* Restore original Post Data */
  wp_reset_postdata();
}
// Add a shortcode
add_shortcode('event-posts', 'dpi_event_posts');




/**** DPI STAFF PAGE WIDGET ****/




if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Staff Page',
		'id' => 'staff_page',
		'description' => 'Put staff members here.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}

// we can only use this Widget if the plugin is active
if( class_exists( 'WidgetImageField' ) )
    add_action( 'widgets_init', create_function( '', "register_widget( 'ITI_Widget_Image_OTM' );" ) );
class ITI_Widget_Image_OTM extends WP_Widget
{
    var $image_field = 'image';  // the image field ID
    function __construct()
    {
        $widget_ops = array(
                'classname'     => 'staff_member',
                'description'   => __( "Staff Member")
            );
        parent::__construct( 'staff_member', __('Staff Member'), $widget_ops );
    }
    function form( $instance )
    {
        $headline   = esc_attr( isset( $instance['headline'] ) ? $instance['headline'] : '' );
        $image_id   = esc_attr( isset( $instance[$this->image_field] ) ? $instance[$this->image_field] : 0 );
        $position   = esc_attr( isset( $instance['position'] ) ? $instance['position'] : '' );
        $quote      = esc_attr( isset( $instance['quote'] ) ? $instance['quote'] : '' );
        $phone      = esc_attr( isset( $instance['phone'] ) ? $instance['phone'] : '' );
        $email      = esc_attr( isset( $instance['email'] ) ? $instance['email'] : '' );
        $image      = new WidgetImageField( $this, $image_id );
        ?>

            <div>
                <label><?php _e( 'Image:' ); ?></label>
                <?php echo $image->get_widget_field(); ?>
            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'headline' ); ?>"><?php _e( 'Name:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'headline' ); ?>" name="<?php echo $this->get_field_name( 'headline' ); ?>" type="text" value="<?php echo $headline; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo $position; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'quote' ); ?>"><?php _e( 'Quote:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" type="text" value="<?php echo $quote; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" />
                </label>
            </p>
        <?php
    }
    function widget( $args, $instance )
    {
        extract($args);
        $headline   = $instance['headline'];
        $image_id   = $instance[$this->image_field];
        $position   = $instance['position'];
        $quote      = $instance['quote'];
        $phone      = $instance['phone'];
        $email      = $instance['email'];
        $image      = new WidgetImageField( $this, $image_id );
        echo $before_widget;
        ?>
            <div class="staff_member">
                <?php if( !empty( $image_id ) ) : ?>
                    <img src="<?php echo $image->get_image_src( '' ); ?>" />
                <?php endif; ?>
                <?php if( !empty( $headline ) ) : ?>
                    <h5 class="staff_name"><?php echo $headline; ?></h5>
                <?php endif; ?>
                <?php if( !empty( $position ) ) : ?>
                    <p class="staff_position"><?php echo $position; ?></p>
                <?php endif; ?>
                <?php if( !empty( $quote ) ) : ?>
                    <p class="staff_quote"><?php echo $quote; ?></p>
                <?php endif; ?>
                <div class="staff_contacts">
                    <?php if( !empty( $email ) ) : ?>
                        <p class="staff_email"><a href="mailto:<?php echo $email; ?>"><img src="/wp/wp-content/themes/dpi-teresa-parents/images/icons/close-envelope-black.png" /><?php echo $email; ?></a></p>
                    <?php endif; ?>
                    <?php if( !empty( $phone ) ) : ?>
                        <p class="staff_phone"><a href="tel:+<?php echo $phone; ?>"><img src="/wp/wp-content/themes/dpi-teresa-parents/images/icons/telephone-black.png" /><?php echo $phone; ?></a></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        echo $after_widget;
    }
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['headline']            = strip_tags( $new_instance['headline'] );
        $instance[$this->image_field]    = intval( strip_tags( $new_instance[$this->image_field] ) );
        $instance['position']               = strip_tags( $new_instance['position'] );
        $instance['quote']               = strip_tags( $new_instance['quote'] );
        $instance['phone']               = strip_tags( $new_instance['phone'] );
        $instance['email']               = strip_tags( $new_instance['email'] );
        return $instance;
    }
}

$staff_page_1 = new ITI_Widget_Image_OTM();




/**** SIDEBAR NAV ****/




function sidebar_nav() {

  global $post;
  if ( is_page() && $post->post_parent && !is_404() )
      $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
  else
      $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

  if ( strlen($childpages) > 0 && !is_404() ) {
      $string = '<ul class="sidebar-nav">' . $childpages . '</ul>';
  } else {
			$string = '<ul class="sidebar-nav">';
			$string .= '<li><a href="' . get_home_url() . '">Home</a></li>';
			$string .= '</ul>';
	}

  return $string;

}

add_shortcode('sidebar_nav', 'sidebar_nav');





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

 	wp_enqueue_script( 'dpi-mobile-navigation', get_template_directory_uri() . '/js/mobile-navigation.js', array('jquery'), true );
	wp_enqueue_script( 'sticky-footer', get_template_directory_uri() . '/js/sticky-footer.js', array('jquery'), true );
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
