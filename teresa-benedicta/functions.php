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
	* fix capabilities
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
				'type' => 'image', // field type
				'options' => '', // type of input
				'default' => '', // default value of input
				'placeholder' => '', // placeholder text of input
				'callback' => '',
			),
		)
	);

	// homepage settings
	$settings['Slider'] = array(
		'parent' => 'Homepage',
		'title' => 'Slider',
		'description' => '',
		'sections' => array(
			'Slider',
		),
		'fields' => array(
      array(
				'parent' => 'Slider',
				'id' => 'homepage_slider_textarea_1',
				'label' => 'Homepage Slider',
				'description' => '',
				'type' => 'textarea',
				'options' => '',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		)
	);

	// footer settings
	$settings['Footer'] = array(
		'parent' => 'Footer',
		'title' => 'Site Info',
		'description' => '',
		'sections' => array(
			'Site Info',
		),
		'fields' => array(
			array(
				'parent' => 'Site Info',
				'id' => 'footer_site_info_text_1',
				'label' => 'Copyright Name',
				'type' => 'text',
				'options' => '',
				'default' => '',
				'placeholder' => '',
				'callback' => 'opt_page_sanitize_text_input',
			),
		),
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
	public function build_sections_nav() {
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
public function build_componets() {
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
		echo '</ul></div>';
	}
}

/**
* Generate HTML for the tab nav
*/
  public function build_tabs_nav($site_part) {
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
public function build_component_part($comp_arr) {
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



/**** EVENTS POST ****/



// create news post section in admin dashboard
function dpi_events_posts_area() {
    $labels = array(
        'name' => _x('Events', 'post type general name'),
        'singular_name' => _x('Event', 'post type singular name'),
        'add_new' => _x('Add New Event', 'Link Box'),
        'add_new_item' => __('Add New Event'),
        'edit-item' => __('Edit Event'),
        'new_item' => __('New Event'),
        'all_items' => __('All Events'),
        'view_item' => __('View Event'),
        'search_items' => __('Search Events'),
        'not_found' => __('No Events Found'),
        'not_found_in_trash' => __('No Events found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Events'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Events',
        'public' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array('slug'=>'events_posts'),
        'menu-position' => 2,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor'),
        'has_archive' => true
    );

    register_post_type('events_posts', $args);
}

add_action('init', 'dpi_events_posts_area');

// meta box for event time and date
class Events_Meta_Box {
	private $screens = array(
		'events_posts',
	);
	private $fields = array(
		array(
			'id' => 'event-date',
			'label' => 'Event Date',
			'type' => 'date',
		),
		array(
			'id' => 'event-time',
			'label' => 'Event Time',
			'type' => 'text',
		),
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'event-info',
				__( 'Event Info', 'event_posts_meta' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'high'
			);
		}
	}

	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'event_info_data', 'event_info_nonce' );
		$this->generate_fields( $post );
	}

	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'event_info_' . $field['id'], true );
			switch ( $field['type'] ) {
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}

	public function save_post( $post_id ) {
		if ( ! isset( $_POST['event_info_nonce'] ) )
			return $post_id;

		$nonce = $_POST['event_info_nonce'];
		if ( !wp_verify_nonce( $nonce, 'event_info_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'event_info_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'event_info_' . $field['id'], '0' );
			}
		}
	}
}

new Events_Meta_Box;

// shortcode handler
function dpi_events_posts( $atts ) {
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
				$posts = getPosts( 'events_posts', 8 );

				$template = '<ul>';

				foreach( $posts as $post ) {

          $template .= '
            <li>
              <a href="' . $post['permalink'] . '">
                <div class="date">
                  <p class="day">' . date( 'j', strtotime($post['date'] ) ) . '</p>
                  <hr>
                  <p class="month">' . date( 'M', strtotime($post['date'] ) ) . '</p>
                </div>
                <div class="excerpt">
        					<p class="title">' . $post['title'] . '</p>
        					<p class="time">' . $post['time'] . '</p>
        				</div>
              </a>
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

add_shortcode('dpi_events_posts', 'dpi_events_posts');



/**** NEWS POST ****/



// create news post section in admin dashboard
function dpi_news_posts_area() {
    $labels = array(
        'name' => _x('News', 'post type general name'),
        'singular_name' => _x('News Post', 'post type singular name'),
        'add_new' => _x('Add New Post', 'Link Box'),
        'add_new_item' => __('Add New Post'),
        'edit-item' => __('Edit Post'),
        'new_item' => __('New Post'),
        'all_items' => __('All News Posts'),
        'view_item' => __('View Post'),
        'search_items' => __('Search News Posts'),
        'not_found' => __('No Posts Found'),
        'not_found_in_trash' => __('No Posts found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'News'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'News',
        'public' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array('slug'=>'news_posts'),
        'menu-position' => 2,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor'),
        'has_archive' => true
    );

    register_post_type('news_posts', $args);
}

add_action('init', 'dpi_news_posts_area');

// shortcode handler
function dpi_news_posts( $atts ) {
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
				$posts = getPosts( 'news_posts', 4 );
				$counter = 0;

				$template = '<ul>';

				foreach( $posts as $post ) {
					$image_url = $post['thumbnailURL'];

					// use a placeholder image if there is no post thumbnail
					if (!$image_url) {
						$image_url = '/wp-content/themes/dpi-theme-v4/images/placeholder_' . $counter . '.jpg';

						if ($counter >= 3) {
							$counter = 0;
						} else {
							$counter++;
						}
					}

          $template .= '
            <li>
              <a class="overlink" href="' . $post['permalink'] . '">
                <div class="image-container" style="background-image: url(' . $image_url . ');"></div>
                <div class="post-info">
        					<p class="date">' . $post['date'] . '</p>
        					<p class="title">' . wp_trim_words( $post['title'], 5, '...' ) . '</p>
        					<a href="' . $post['permalink'] . '">Read more...</a>
        				</div>
              </a>
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

add_shortcode('dpi_news_posts', 'dpi_news_posts');



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

// dpi_create_widget_area('Footer', 'footer_widget', 'Footer widget area.', 'footer-widget');

/**
* usage: <?php dynamic_sidebar( 'sidebar-id' ); ?>
*/



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




/**** OTHER MODIFICATIONS ****/




// remove unwanted menu pages in admin dashboard
function remove_menus() {
	// remove_menu_page( 'edit.php' ); // remove posts
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'remove_menus' );

// custom post query
function getPosts( $cat, $num ) {

	// the query
  $the_query = new WP_Query( array( 'post_type' => $cat, 'posts_per_page' => $num, 'post_status' => array( 'publish', 'future',  ) ) );

	if ( $the_query->have_posts() ) {
		$counter = 0;
  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();

			// get meta box info from events
			if ($cat === 'events_posts') {
				$posts[get_the_title() . '_' . $counter] = array(
					'title' => get_the_title(),
					'permalink' => get_permalink(),
					'date' => get_post_meta( get_the_id(), 'event_info_event-date', true ),
					'time' => get_post_meta( get_the_id(), 'event_info_event-time', true ),
				);
			} else {
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
				$counter++;
  		}
  	} else {
  	// no posts found
  }

	wp_reset_postdata();
	return $posts;
}

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
