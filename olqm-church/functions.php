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
		// Edit user capabilities
		add_action( 'admin_init', array( $this, 'add_theme_caps') );
    // Initialise settings
  	add_action( 'admin_init', array( $this, 'init' ) );
  	// Register plugin settings
  	add_action( 'admin_init' , array( $this, 'register_settings' ) );
		// user info script
		add_action( 'admin_head', array( $this, 'pass_user_info' ) );
  	// Add settings page to menu
  	add_action( 'admin_menu' , array( $this, 'add_menu_item' ) );
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
* Pass current user info to js
*/
	public function pass_user_info() {
		$user_info = json_encode( wp_get_current_user() );

		echo '<script> var _current_user_info_ =' . $user_info . ';</script>';
	}
	/**
	* STUPID WORDPRESS MEDIA UPLOAD FIX
	*/
	public function add_theme_caps() {
	    $role = get_role( 'editor' );

	    $role->add_cap( 'manage_options' );
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
    'Header',
    'Homepage',
		'Sidebar',
		'Footer',
	);
	return $parents;
}
/**
* Model of components and fields
*/
private function settings_fields() {

	// header settings
	$settings['Site_Logo'] = array(
		'parent' => 'Header',
		'title' => 'Logo',
		'description' => '',
		'sections' => array(
			'Logo',
		),
		'fields' => array(
      array(
				'parent' => 'Logo', // containing component
				'id' => 'header_logo_image_0', // id
				'label' => 'Site Logo', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

	$settings['Banner Image'] = array(
		'parent' => 'Header',
		'title' => 'Banner Image',
		'description' => '',
		'sections' => array(
			'Banner Image',
		),
		'fields' => array(
      array(
				'parent' => 'Banner Image', // containing component
				'id' => 'header_logo_image_100', // id
				'label' => 'Background image on inner pages', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

  // homepage settings
	$settings['Image Slider'] = array(
		'parent' => 'Homepage',
		'title' => 'Image Slider',
		'description' => '',
		'sections' => array(
			'Slider Shortcode',
		),
		'fields' => array(
      array(
				'parent' => 'Slider Shortcode', // containing component
				'id' => 'homepage_image_slider_textarea_1', // id
				'label' => '', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '[rev_slider alias="home slider"]', // default value of input
				'placeholder' => '[rev_slider alias="home slider"]', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

  $settings['Main Links'] = array(
		'parent' => 'Homepage',
		'title' => 'Main Links',
		'description' => '',
		'sections' => array(
			'Link 1',
      'Link 2',
      'Link 3',
		),
		'fields' => array(
      array(
				'parent' => 'Link 1', // containing component
				'id' => 'homepage_main_links_text_2', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 1', // containing component
				'id' => 'homepage_main_links_text_3', // id
				'label' => 'Link Description', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 1', // containing component
				'id' => 'homepage_main_links_text_4', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 2', // containing component
				'id' => 'homepage_main_links_text_5', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 2', // containing component
				'id' => 'homepage_main_links_text_6', // id
				'label' => 'Link Description', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 2', // containing component
				'id' => 'homepage_main_links_text_7', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 3', // containing component
				'id' => 'homepage_main_links_text_8', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 3', // containing component
				'id' => 'homepage_main_links_text_9', // id
				'label' => 'Link Description', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Link 3', // containing component
				'id' => 'homepage_main_links_text_10', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

  $settings['Church Info'] = array(
		'parent' => 'Homepage',
		'title' => 'Church Info',
		'description' => '',
		'sections' => array(
			'Introduction',
      'Tab 1',
      'Tab 2',
      'Tab 3',
		),
		'fields' => array(
      array(
				'parent' => 'Introduction', // containing component
				'id' => 'homepage_church_info_text_11', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Introduction', // containing component
				'id' => 'homepage_church_info_text_12', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 1', // containing component
				'id' => 'homepage_church_info_text_13', // id
				'label' => 'Tab Name', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 1', // containing component
				'id' => 'homepage_church_info_text_14', // id
				'label' => 'Content Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 1', // containing component
				'id' => 'homepage_church_info_textarea_15', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 1', // containing component
				'id' => 'homepage_church_info_image_16', // id
				'label' => 'Tab Image', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
      array(
				'parent' => 'Tab 2', // containing component
				'id' => 'homepage_church_info_text_17', // id
				'label' => 'Tab Name', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 2', // containing component
				'id' => 'homepage_church_info_text_18', // id
				'label' => 'Content Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 2', // containing component
				'id' => 'homepage_church_info_textarea_19', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 2', // containing component
				'id' => 'homepage_church_info_image_20', // id
				'label' => 'Tab Image', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
      array(
				'parent' => 'Tab 3', // containing component
				'id' => 'homepage_church_info_text_21', // id
				'label' => 'Tab Name', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 3', // containing component
				'id' => 'homepage_church_info_text_22', // id
				'label' => 'Content Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 3', // containing component
				'id' => 'homepage_church_info_textarea_23', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Tab 3', // containing component
				'id' => 'homepage_church_info_image_24', // id
				'label' => 'Tab Image', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

  $settings['Mass Times'] = array(
		'parent' => 'Homepage',
		'title' => 'Mass Times',
		'description' => '',
		'sections' => array(
			'Section Background',
			'Section Info',
      'Time Slot 1',
      'Time Slot 2',
      'Time Slot 3',
		),
		'fields' => array(
			array(
				'parent' => 'Section Background', // containing component
				'id' => 'homepage_mass_times_image_25', // id
				'label' => 'Background Image', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
      array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_mass_times_text_26', // id
				'label' => 'Section Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_mass_times_text_27', // id
				'label' => 'Link Text', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_mass_times_text_28', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'homepage_mass_times_text_29', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'homepage_mass_times_text_30', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'homepage_mass_times_text_31', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'homepage_mass_times_text_32', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'homepage_mass_times_text_33', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'homepage_mass_times_text_34', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'homepage_mass_times_text_35', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'homepage_mass_times_text_36', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'homepage_mass_times_text_37', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Prayer Section'] = array(
		'parent' => 'Homepage',
		'title' => 'Prayer Section',
		'description' => '',
		'sections' => array(
			'Section Info',
		),
		'fields' => array(
      array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_section_info_text_38', // id
				'label' => 'Section Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_section_info_textarea_39', // id
				'label' => 'Section Description', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Daily Verse'] = array(
		'parent' => 'Homepage',
		'title' => 'Daily Verse',
		'description' => '',
		'sections' => array(
			'Settings',
			'Background Image'
		),
		'fields' => array(
      array(
				'parent' => 'Settings', // containing component
				'id' => 'homepage_daily_verse_text_40', // id
				'label' => 'Shortcode', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Background Image', // containing component
				'id' => 'homepage_daily_verse_image_41', // id
				'label' => 'Background', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

	$settings['Bulletins'] = array(
		'parent' => 'Homepage',
		'title' => 'Bulletins',
		'description' => '',
		'sections' => array(
			'Section Info',
		),
		'fields' => array(
      array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_bulletins_text_42', // id
				'label' => 'Section Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_bulletins_textrea_43', // id
				'label' => 'Section Description', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_bulletins_textrea_435', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Section Info', // containing component
				'id' => 'homepage_bulletins_textrea_436', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Promo'] = array(
		'parent' => 'Homepage',
		'title' => 'Promo',
		'description' => '',
		'sections' => array(
			'Promo Content',
		),
		'fields' => array(
      array(
				'parent' => 'Promo Content', // containing component
				'id' => 'homepage_promo_textarea_44', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Promo Content', // containing component
				'id' => 'homepage_promo_text_45', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Promo Content', // containing component
				'id' => 'homepage_promo_text_46', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// Sidebar settings
	$settings['Sidebar Links'] = array(
		'parent' => 'Sidebar',
		'title' => 'Sidebar Links',
		'description' => '',
		'sections' => array(
			'Link 1',
			'Link 2',
			'Link 3',
		),
		'fields' => array(
      array(
				'parent' => 'Link 1', // containing component
				'id' => 'sidebar_link_1_text_47', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link 1', // containing component
				'id' => 'sidebar_link_1_text_48', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link 2', // containing component
				'id' => 'sidebar_link_1_text_49', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),array(
				'parent' => 'Link 2', // containing component
				'id' => 'sidebar_link_1_text_50', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link 3', // containing component
				'id' => 'sidebar_link_1_text_51', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),array(
				'parent' => 'Link 3', // containing component
				'id' => 'sidebar_link_1_text_52', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Calendar'] = array(
		'parent' => 'Sidebar',
		'title' => 'Calendar',
		'description' => '',
		'sections' => array(
			'Calendar Shortcode',
			'Link',
		),
		'fields' => array(
      array(
				'parent' => 'Calendar Shortcode', // containing component
				'id' => 'sidebar_calendar_textarea_53', // id
				'label' => 'Shortcode', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link', // containing component
				'id' => 'sidebar_calendar_textarea_5399', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link', // containing component
				'id' => 'sidebar_calendar_textarea_5499', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Sidebar Mass Times'] = array(
		'parent' => 'Sidebar',
		'title' => 'Mass Times',
		'description' => '',
		'sections' => array(
			'Time Slot 1',
			'Time Slot 2',
			'Time Slot 3',
		),
		'fields' => array(
      array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'sidebar_mass_times_text_54', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'sidebar_mass_times_text_55', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 1', // containing component
				'id' => 'sidebar_mass_times_text_56', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'sidebar_mass_times_text_57', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'sidebar_mass_times_text_58', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 2', // containing component
				'id' => 'sidebar_mass_times_text_59', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'sidebar_mass_times_text_60', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'sidebar_mass_times_text_61', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Time Slot 3', // containing component
				'id' => 'sidebar_mass_times_text_62', // id
				'label' => 'Event', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// footer settings
	$settings['About'] = array(
		'parent' => 'Footer',
		'title' => 'About',
		'description' => '',
		'sections' => array(
			'About',
		),
		'fields' => array(
      array(
				'parent' => 'About', // containing component
				'id' => 'footer_about_text_63', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'About', // containing component
				'id' => 'footer_about_textarea_64', // id
				'label' => 'Content', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Footer Connect'] = array(
		'parent' => 'Footer',
		'title' => 'Contact',
		'description' => '',
		'sections' => array(
			'Contact Info',
			'Phone',
			'Social Link 1',
			'Social Link 2',
			'Social Link 3',
		),
		'fields' => array(
      array(
				'parent' => 'Contact Info', // containing component
				'id' => 'footer_contact_info_text_64', // id
				'label' => 'Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Contact Info', // containing component
				'id' => 'footer_contact_info_textarea_65', // id
				'label' => 'Address', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Contact Info', // containing component
				'id' => 'footer_contact_info_textarea_66', // id
				'label' => 'Office Hours', // title of the input
				'description' => '', // descrip of the input
				'type' => 'textarea',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Phone', // containing component
				'id' => 'footer_contact_image_68', // id
				'label' => 'Icon', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
			array(
				'parent' => 'Phone', // containing component
				'id' => 'footer_contact_text_69', // id
				'label' => 'Phone Number', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 1', // containing component
				'id' => 'footer_contact_image_70', // id
				'label' => 'Icon', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
			array(
				'parent' => 'Social Link 1', // containing component
				'id' => 'footer_contact_text_71', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 1', // containing component
				'id' => 'footer_contact_text_72', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 2', // containing component
				'id' => 'footer_contact_image_73', // id
				'label' => 'Icon', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
			array(
				'parent' => 'Social Link 2', // containing component
				'id' => 'footer_contact_text_74', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 2', // containing component
				'id' => 'footer_contact_text_75', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 3', // containing component
				'id' => 'footer_contact_image_76', // id
				'label' => 'Icon', // title of the input
				'description' => '', // descrip of the input
				'type' => 'image',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
			array(
				'parent' => 'Social Link 3', // containing component
				'id' => 'footer_contact_text_77', // id
				'label' => 'Link Title', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Social Link 3', // containing component
				'id' => 'footer_contact_text_78', // id
				'label' => 'Link URL', // title of the input
				'description' => '', // descrip of the input
				'type' => 'text',
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// end homepage settings
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
		$html .= '<div class="page-loading"><div class="opt-page-spinner"></div></div>';
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



/**** PRAYER ITEMS COMPONENT ****/




// create custom post category
function create_prayer_item_cat() {
  $post_category = array(
    'cat_name' => 'Prayer Items',
    'category_description' => 'Posts in this category will be displayed within the Prayer Items on the front page.',
    'category_nicename' => 'prayer_items',
    'category_parent' => ''
  );

  wp_insert_category( $post_category );
}

add_action('admin_init', 'create_prayer_item_cat');

// shortcode handler
function dpi_prayer_posts( $atts ) {
	extract( shortcode_atts( array(
		'layout' => '',
	),  $atts ) );

	switch( $layout ) {
		case 'sidebar_template':
				// $posts = getPosts( 'prayer_items', 3 );
				//
				// $template = '<ul>';
				//
				// foreach( $posts as $post ) {
				// 		$template .= '<li>';
				// 		$template .= '<a href="' . $post['permalink'] . '">' . $post['title'] . '</a>';
				// 		$template .= '</li>';
				// }
				//
				// $template .= '</ul>';
				//
				// return $template;
				break;

		case 'homepage_template':
				$posts = getPosts( 'prayer_items', 4 );
				$counter = 0;

				$template = '<ul class="prayer-list">';

				foreach( $posts as $post ) {
					$image_url = $post['thumbnailURL'];

					// use a placeholder image if there is no post thumbnail
					if (!$image_url) {
						$image_url = '/wp-content/themes/olqm-church/images/placeholder_' . $counter . '.jpg';

						if ($counter >= 3) {
							$counter = 0;
						} else {
							$counter++;
						}
					}

					$template .= '
						<li class="prayer-item">
							<a href="' . $post['permalink'] . '" class="pop-up">
								<div class="image-container" style="background-image: url(' . $image_url . ');">
									<div class="message-overlay">
										<span>Read More</span>
									</div>
								</div>
							</a>
							<span class="prayer-title">' . wp_trim_words( $post['title'], 5, '...' ) . '</span>
							<p class="prayer-excerpt">' . wp_trim_words( $post['excerpt'], 23, '...' ) . '</p>
							<a href="' . $post['permalink'] . '" class="btn">Read More</a>
						</li>
					';
				}

				$template .= '</ul>';

				return $template;
				break;

		default:
				break;
	}
}
// Add a shortcode
add_shortcode('prayer_posts', 'dpi_prayer_posts');




/**** EVENTS POSTS COMPONENT ****/




// create custom post category
function create_event_posts_cat() {
  $post_category = array(
    'cat_name' => 'News and Events',
    'category_description' => 'Posts in this category will be displayed within the news and events on the front page.',
    'category_nicename' => 'news-and-events',
    'category_parent' => ''
  );

  wp_insert_category( $post_category );
}

add_action('admin_init', 'create_event_posts_cat');

// shortcode handler
function dpi_events_posts( $atts ) {
	extract( shortcode_atts( array(
		'layout' => '',
	),  $atts ) );

	switch( $layout ) {
		case 'upcoming_template':
				$posts = getPosts( 'news-and-events', 5 );
				$post_counter = 0;
				$image_counter = 0;
				$template = '';

				foreach( $posts as $post ) {

					// skip first post
					if ($post_counter > 0) {
						$image_url = $post['thumbnailURL'];

						// use a placeholder image if there is no post thumbnail
						if (!$image_url) {
							$image_url = '/wp-content/themes/olqm-church/images/placeholder_event_' . $image_counter . '.jpg';

							if ($image_counter >= 4) {
								$image_counter = 0;
							} else {
								$image_counter++;
							}
						}

						$template .= '
						<div class="post">
							<a href="' . $post['permalink'] . '" class="pop-up">
								<div class="image-container" style="background-image: url(' . $image_url . ');">
									<div class="message-overlay">
										<span>Read More</span>
									</div>
								</div>
								<div class="date-block">
									<span class="date-day">' . $post['day'] . '</span>
									<hr>
									<span class="date-month">' . $post['month'] . '.</span>
									<span class="date-year">' . $post['year'] . '</span>
								</div>
								<div class="content">
									<h3>' . wp_trim_words( $post['title'], 4, '...' ) . '</h3>
									<p>' . wp_trim_words( $post['excerpt'], 25, '...' ) . '</p>
								</div>
							</a>
						</div>
						';
					} else {
						$post_counter++;
					}
				}


				return $template;
				break;

		case 'featured_template':
				$posts = getPosts( 'news-and-events', 1 );
				$post = array_values($posts)[0];
				$image_url = $post['thumbnailURL'];

				// use a placeholder image if there is no post thumbnail
				if (!$image_url) {
					$image_url = '/wp-content/themes/olqm-church/images/placeholder_event_0.jpg';
				}

				$template = '
					<a href="' . $post['permalink'] . '" class="pop-up">
					<div class="image-container" style="background-image: url(' . $image_url . ');">
						<div class="message-overlay">
							<span>Read More</span>
						</div>
					</div>
					<div class="featured-post-summary">
						<div class="date-block">
							<span class="date-day">' . $post['day'] . '</span>
							<hr>
							<span class="date-month">' . $post['month'] . '.</span>
							<span class="date-year">' . $post['year'] . '</span>
						</div>
						<div class="content">
							<h3>' . wp_trim_words( $post['title'], 10, '...' ) . '</h3>
							<p>' . wp_trim_words( $post['excerpt'], 35, '...' ) . '</p>
						</div>
					</div>
					</a>
				';

				return $template;
				break;

		default:
				break;
	}
}
// Add a shortcode
add_shortcode('events_posts', 'dpi_events_posts');



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

// allow svg uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// custom post query
function getPosts( $cat, $num ) {
	// the query
  $the_query = new WP_Query( array( 'category_name' => $cat, 'posts_per_page' => $num, 'post_status' => array( 'publish', 'future',  ) ) );

	if ( $the_query->have_posts() ) {

  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();

			$posts[get_the_title()] = array(
					'title' => get_the_title(),
					'excerpt' => get_the_excerpt(),
					'content' => get_the_content(),
					'permalink' => get_permalink(),
					'date' => get_the_date(),
					'year' => get_the_date( 'Y' ),
					'month' => get_the_date( 'M' ),
					'day' => get_the_date( 'd' ),
					'thumbnailURL' => get_the_post_thumbnail_url(),
			);

  		}
  	} else {
  	// no posts found
  }

	wp_reset_postdata();
	return $posts;
}

// custom excerpt length
function custom_excerpt_length( $length ) {
	global $post;

	// if ($post->post_type = 'prayer_items') {
	// 	return 25;
	// } else {
		return 55; //default is 55
	// }

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

 	wp_enqueue_script( 'dpi-mobile-navigation', get_template_directory_uri() . '/js/responsive-nav.js', array('jquery'), true );
	wp_enqueue_script( 'dpi-page-height', get_template_directory_uri() . '/js/page-height.js', array('jquery'), true );
	wp_enqueue_script( 'dpi-tab-panel', get_template_directory_uri() . '/js/dpi-tab-panel.js', array('jquery'), true );
	wp_enqueue_script( 'dpi-type-rule', get_template_directory_uri() . '/js/type-rule.js', array('jquery'), true );
 }
 add_action( 'wp_enqueue_scripts', 'dpi_theme_scripts' );

 /**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

// // remove ie css from twentytwelve theme
// function diocesan_ie_dequeue_styles() {
//     wp_dequeue_style( 'twentysixteen-ie' );
//  }
//  add_action( 'wp_enqueue_scripts', 'diocesan_ie_dequeue_styles', 11 );
//
// // remove ie css from twentytwelve theme
// function diocesan_ie8_dequeue_styles() {
//     wp_dequeue_style( 'twentysixteen-ie8' );
//  }
//  add_action( 'wp_enqueue_scripts', 'diocesan_ie8_dequeue_styles', 11 );
//
// // remove ie css from twentytwelve theme
// function diocesan_ie7_dequeue_styles() {
//     wp_dequeue_style( 'twentysixteen-ie7' );
//  }
//  add_action( 'wp_enqueue_scripts', 'diocesan_ie7_dequeue_styles', 11 );
//
// //add new from child theme
// wp_enqueue_style( 'diocesan-ie', get_stylesheet_directory_uri() . '/ie.css', array( 'twentysixteen-style' ), '1.0' );
// $wp_styles->add_data( 'diocesan-ie', 'conditional', 'lt IE 9' );
