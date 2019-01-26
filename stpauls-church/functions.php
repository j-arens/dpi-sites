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
		$user_info = json_encode( get_currentuserinfo() );

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
		'General Settings',
		'Header',
		'Homepage',
		'Footer',
	);
	return $parents;
}
/**
* Model of components and fields
*/
private function settings_fields() {

	// general settings
	$settings['Typography'] = array(
		'parent' => 'General Settings',
		'title' => 'Site Typography',
		'description' => '',
		'sections' => array(
			'Font Families',
			'Heading Text Color',
			'Body Text Color',
			'Link Text Color',
			'Heading Sizes',
			'Body Text Sizes',
		),
		'fields' => array(
      array(
				'parent' => 'Font Families', // containing component
				'id' => 'typography_font_text_100', // id
				'label' => 'Primary Font', // title of the input
				'description' => '', // descrip of the input
				'type' => 'select',
				'options' => array('Cormorant Garamond' => 'Cormorant Garamond', 'Playfair Display' => 'Playfair Display', 'Source Serif Pro' => 'Source Serif Pro', 'Cardo' => 'Cardo'), // type of input
				'default' => 'Cormant Garamond', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
			array(
				'parent' => 'Font Families',
				'id' => 'typography_font_text_101',
				'label' => 'Secondary Font',
				'description' => '',
				'type' => 'select',
				'options' => array('Open Sans' => 'Open Sans'),
				'default' => 'Open Sans',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Text Color',
				'id' => 'typography_heading_text_color_color_102',
				'label' => 'Heading Color',
				'description' => 'Default color: #9d2a35',
				'type' => 'color',
				'options' => '',
				'default' => '#9d2a35',
				'placeholder' => '#9d2a35',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Body Text Color',
				'id' => 'typography_body_text_color_color_103',
				'label' => 'Body Text Color',
				'description' => 'Default color: #000000',
				'type' => 'color',
				'options' => '',
				'default' => '#000000',
				'placeholder' => '#000000',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Link Text Color',
				'id' => 'typography_link_text_color_color_104',
				'label' => 'Link Text Color',
				'description' => 'Default color: #9d2a35',
				'type' => 'color',
				'options' => '',
				'default' => '#9d2a35',
				'placeholder' => '#9d2a35',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_105',
				'label' => 'H1 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_106',
				'label' => 'H1 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_107',
				'label' => 'H2 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_108',
				'label' => 'H2 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_109',
				'label' => 'H3 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_110',
				'label' => 'H3 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_111',
				'label' => 'H4 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_112',
				'label' => 'H4 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_113',
				'label' => 'H5 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_114',
				'label' => 'H5 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_text_115',
				'label' => 'H6 Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Heading Sizes',
				'id' => 'typography_heading_sizes_select_116',
				'label' => 'H6 Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Body Text Sizes',
				'id' => 'typography_body_text_sizes_text_117',
				'label' => 'Paragraph Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => '',
			),
			array(
				'parent' => 'Body Text Sizes',
				'id' => 'typography_body_text_sizes_select_118',
				'label' => 'Paragraph Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Body Text Sizes',
				'id' => 'typography_body_text_sizes_text_119',
				'label' => 'Anchor Font Size',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => 'px',
				'callback' => '',
			),
			array(
				'parent' => 'Body Text Sizes',
				'id' => 'typography_body_text_sizes_select_120',
				'label' => 'Anchor Font Weight',
				'description' => '',
				'type' => 'select',
				'options' => array('200' => '200', '300' => '300', '400' => '400', '500' => '500', '600' => '600', '700' => '700'),
				'default' => '400',
				'placeholder' => '',
				'callback' => '',
			),
		)
	);

	$settings['Color'] = array(
		'parent' => 'General Settings',
		'title' => 'Site Color',
		'description' => '',
		'sections' => array(
			'Primary Color',
			'Secondary Color',
			'Neutral Color',
			'Base Color',
		),
		'fields' => array(
      array(
				'parent' => 'Primary Color',
				'id' => 'color_primary_color_text_102',
				'label' => 'Primary Color',
				'description' => 'Default color: #9d2a35',
				'type' => 'color',
				'options' => '',
				'default' => '#9d2a35',
				'placeholder' => '#9d2a35',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Secondary Color',
				'id' => 'color_secondary_color_text_103',
				'label' => 'Secondary Color',
				'description' => 'Default color: #fffff7',
				'type' => 'color',
				'options' => '',
				'default' => '#fffff7',
				'placeholder' => '#fffff7',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Neutral Color',
				'id' => 'color_neutral_color_text_105',
				'label' => 'Neutral Color',
				'description' => 'Default color: #bbbbbb',
				'type' => 'color',
				'options' => '',
				'default' => '#bbbbbb',
				'placeholder' => '#bbbbbb',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Base Color',
				'id' => 'color_base_color_text_106',
				'label' => 'Base Color',
				'description' => 'Default color: #000000',
				'type' => 'color',
				'options' => '',
				'default' => '#000000',
				'placeholder' => '#000000',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// header settings

  $settings['Social Links'] = array(
		'parent' => 'Header',
		'title' => 'Social Links',
		'description' => '',
		'sections' => array(
			'Address',
      'Phone Number',
      'Social Link 1',
      'Social Link 2',
		),
		'fields' => array(
      array(
				'parent' => 'Address',
				'id' => 'social_links_address_image_0',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Address',
				'id' => 'social_links_address_text_1',
				'label' => 'Address',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Phone Number',
				'id' => 'social_links_phone_number_image_2',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
      array(
				'parent' => 'Phone Number',
				'id' => 'social_links_phone_number_text_3',
				'label' => 'Phone Number',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Social Link 1',
				'id' => 'social_links_facebook_image_4',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
      array(
				'parent' => 'Social Link 1',
				'id' => 'social_links_facebook_text_5',
				'label' => 'Social Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Social Link 1',
				'id' => 'social_links_facebook_text_6',
				'label' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Social Link 2',
				'id' => 'social_links_my_parish_app_image_7',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
      array(
				'parent' => 'Social Link 2',
				'id' => 'social_links_my_parish_app_text_8',
				'label' => 'Social Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Social Link 2',
				'id' => 'social_links_my_parish_app_text_9',
				'label' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

  $settings['Logo'] = array(
		'parent' => 'Header',
		'title' => 'Logo',
		'description' => '',
		'sections' => array(
			'Site Logo',
		),
		'fields' => array(
      array(
				'parent' => 'Site Logo',
				'id' => 'logo_site_logo_image_10',
				'label' => '',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
		)
	);

  $settings['Church Info'] = array(
		'parent' => 'Header',
		'title' => 'Church Info',
		'description' => '',
		'sections' => array(
			'Mass Times',
      'Confession',
      'Office Hours',
		),
		'fields' => array(
      array(
				'parent' => 'Mass Times',
				'id' => 'church_info_mass_times_textarea_11',
				'label' => 'Mass Times',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Confession',
				'id' => 'church_info_confession_textarea_12',
				'label' => 'Confession Times',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Office Hours',
				'id' => 'church_info_office_hours_textarea_13',
				'label' => 'Office Hours',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// end header settings

	// homepage settings

	$settings['Slider'] = array(
		'parent' => 'Homepage',
		'title' => 'Slider',
		'description' => '',
		'sections' => array(
			'Slider Shortcode',
		),
		'fields' => array(
      array(
				'parent' => 'Slider Shortcode',
				'id' => 'homepage_slider_shortcode_text_701',
				'label' => 'Slider Shortcode',
				'description' => '',
				'type' => 'textarea',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Church News'] = array(
		'parent' => 'Homepage',
		'title' => 'Church News',
		'description' => '',
		'sections' => array(
			'Section Title',
			'Button Link',
			'Background Image',
		),
		'fields' => array(
      array(
				'parent' => 'Section Title',
				'id' => 'homepage_section_title_text_14',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Button Link',
				'id' => 'homepage_button_link_text_15',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Button Link',
				'id' => 'homepage_button_link_text_16',
				'label' => 'Link Text',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Background Image',
				'id' => 'homepage_background_iamge_image_300',
				'label' => 'Background Image',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
		)
	);

	$settings['Icon Boxes'] = array(
		'parent' => 'Homepage',
		'title' => 'Icon Boxes',
		'description' => '',
		'sections' => array(
			'Icon Box 1',
			'Icon Box 2',
			'Icon Box 3',
		),
		'fields' => array(
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_image_17',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
      array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_18',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_19',
				'label' => 'Saturday Mass Times',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_20',
				'label' => 'Sunday Mass Times',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_21',
				'label' => 'Weekday Mass Times',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_22',
				'label' => 'Link Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 1',
				'id' => 'homepage_icon_box_1_text_23',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 2',
				'id' => 'homepage_icon_box_2_image_24',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Icon Box 2',
				'id' => 'homepage_icon_box_2_text_25',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 2',
				'id' => 'homepage_icon_box_2_text_26',
				'label' => 'Link Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 2',
				'id' => 'homepage_icon_box_2_text_27',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 3',
				'id' => 'homepage_icon_box_3_image_28',
				'label' => 'Icon',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Icon Box 3',
				'id' => 'homepage_icon_box_3_text_29',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 3',
				'id' => 'homepage_icon_box_3_text_30',
				'label' => 'Link Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Icon Box 3',
				'id' => 'homepage_icon_box_3_text_31',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Important Links'] = array(
		'parent' => 'Homepage',
		'title' => 'Important Links',
		'description' => '',
		'sections' => array(
			'Saint of the Day',
			'Vatican News',
		),
		'fields' => array(
      array(
				'parent' => 'Saint of the Day',
				'id' => 'homepage_saint_of_the_day_text_32',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Saint of the Day',
				'id' => 'homepage_saint_of_the_day_text_33',
				'label' => 'Link Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Saint of the Day',
				'id' => 'homepage_saint_of_the_day_text_34',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Vatican News',
				'id' => 'homepage_vatican_news_text_35',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Vatican News',
				'id' => 'homepage_vatican_news_text_36',
				'label' => 'Link Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Vatican News',
				'id' => 'homepage_vatican_news_text_37',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// footer settings
	$settings['Widget Area 1'] = array(
		'parent' => 'Footer',
		'title' => 'Widget Area 1',
		'description' => '',
		'sections' => array(
			'Content',
		),
		'fields' => array(
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_1_text_38',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_1_image_39',
				'label' => 'Link Image',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_1_text_40',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Widget Area 2'] = array(
		'parent' => 'Footer',
		'title' => 'Widget Area 2',
		'description' => '',
		'sections' => array(
			'Content',
		),
		'fields' => array(
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_2_text_41',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_2_image_42',
				'label' => 'Link Image',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_2_text_43',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Widget Area 3'] = array(
		'parent' => 'Footer',
		'title' => 'Widget Area 3',
		'description' => '',
		'sections' => array(
			'Content',
		),
		'fields' => array(
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_3_text_44',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
      array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_3_image_45',
				'label' => 'Link Image',
				'description' => '',
				'type' => 'image',
				'default' => '',
				'placeholder' => '',
				'callback' => '',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_3_text_46',
				'label' => 'Link URL',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	$settings['Widget Area 4'] = array(
		'parent' => 'Footer',
		'title' => 'Widget Area 4',
		'description' => '',
		'sections' => array(
			'Content',
		),
		'fields' => array(
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_4_text_47',
				'label' => 'Title',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_4_text_48',
				'label' => 'Street Address',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_4_text_49',
				'label' => 'City',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_4_text_50',
				'label' => 'Phone Number',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
			array(
				'parent' => 'Content',
				'id' => 'footer_widget_area_4_text_51',
				'label' => 'Email Address',
				'description' => '',
				'type' => 'text',
				'default' => '',
				'placeholder' => '',
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





/**** EVENTS POSTS ****/



// custom post query
function getPosts( $cat, $num ) {
	// the query
  $the_query = new WP_Query( array( 'category_name' => $cat, 'posts_per_page' => $num ) );

	if ( $the_query->have_posts() ) {

  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();

			$posts[get_the_title()] = array(
					'title' => get_the_title(),
					'excerpt' => get_the_excerpt(),
					'content' => get_the_content(),
					'permalink' => get_permalink(),
					'date' => get_the_date(),
					'thumbnailURL' => get_the_post_thumbnail_url(),
			);

  		}
  	} else {
  	// no posts found
  }

	wp_reset_postdata();
	return $posts;
}


// shortcode handler
function dpi_event_posts( $atts ) {
	extract( shortcode_atts( array(
		'layout' => '',
	),  $atts ) );

	switch( $layout ) {
		case 'sidebar_template':
				$posts = getPosts( 'parish_news', 3 );

				$template = '<ul>';

				foreach( $posts as $post ) {
						$template .= '<li>';
						$template .= '<a href="' . $post['permalink'] . '">' . $post['title'] . '</a>';
						$template .= '</li>';
				}

				$template .= '</ul>';

				return $template;
				break;

		case 'homepage_template':
				$posts = getPosts( 'parish_news', 3 );
				$counter = 0;

				$template = '<ul>';

				foreach( $posts as $post ) {
					$image_url = $post['thumbnailURL'];

					// use a placeholder image if there is no post thumbnail
					if (!$image_url) {
						$image_url = '/wp-content/themes/stpauls-church/images/placeholder_' . $counter . '.jpg';

						if ($counter >= 2) {
							$counter = 0;
						} else {
							$counter++;
						}
					}

					$template .= '<li class="article-excerpt"><article>';
					$template .= '<img src="' . $image_url . '"/>';
					$template .= '<a href="' . $post['permalink'] . '"><h2 class="no-margin">' . $post['title'] . '</h2></a>';
					$template .= '<h3>' . $post['date'] . '</h3>';
					$template .= '<p>' . $post['excerpt'] . '</p>';
					$template .= '</article></li>';

				}

				$template .= '</ul>';

				return $template;
				break;

		default:
				break;
	}
}
// Add a shortcode
add_shortcode('event-posts', 'dpi_event_posts');



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




// allow svg uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

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

	wp_enqueue_script( 'dpi-site-customizer', get_template_directory_uri() . '/js/site_customizer.js', array('jquery'), false );
 	wp_enqueue_script( 'dpi-mobile-navigation', get_template_directory_uri() . '/js/mobile-navigation.js', array('jquery'), true );
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
