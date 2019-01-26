<?php

class DPI_Customizer {

  private $manager;
  private $localize = [];
  private $customizer = [
    'panels' => [
      [
        'id' => 'dpi_homepage_0001',
        'method' => 'add_panel',
        'settings' => [
          'title' => 'Homepage'
        ]
      ]
    ],
    'sections' => [
      [
        'id' => 'dpi_homepage_intro_0002',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Intro',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_featured_links_0018',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Featured Links',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_media_center_0028',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Media Center',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ]
    ],
    'settings' => [
      [
        'id' => 'dpi_homepage_intro_title_0003',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Welcome To The',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.home-intro h3'
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_subtitle_0006',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Cathedral of Christ the King',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.home-intro .subheading',
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_p1_0012',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.home-intro .content p:first-of-type',
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_p2_0013',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.home-intro .content p:nth-of-type(2)',
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_p3_0017',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.home-intro .content p:last-of-type',
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_link_0019',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_bulletins_link_0021',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_donations_link_0022',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_join_parish_link_0023',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_live_stream_link_0029',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_live_stream_img_0030',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.home-media figure:first-of-type'
        ]
      ],
      [
        'id' => 'dpi_homepage_homilies_link_0032',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_homilies_img_0033',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.home-media figure:nth-of-type(2)'
        ]
      ],
      [
        'id' => 'dpi_homepage_mpa_link_0036',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_mpa_img_0037',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.home-media figure:nth-of-type(3)'
        ]
      ],
      [
        'id' => 'dpi_homepage_podcasts_link_0039',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_homepage_podcasts_img_0040',
        'method' => 'add_setting',
        'settings' => [
          'type' => 'theme_mod',
          'capability' => 'manage_options',
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.home-media figure:last-of-type'
        ]
      ]
    ],
    'controls' => [
      [
        'id' => 'dpi_homepage_intro_title_control_0004',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Intro Title',
          'type' => 'text',
          'section' => 'dpi_homepage_intro_0002',
          'settings' => 'dpi_homepage_intro_title_0003',
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_subtitle_control_0007',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Intro Subtitle',
          'type' => 'text',
          'section' => 'dpi_homepage_intro_0002',
          'settings' => 'dpi_homepage_intro_subtitle_0006',
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_control_0013',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Intro Message Paragraph 1',
          'type' => 'textarea',
          'section' => 'dpi_homepage_intro_0002',
          'settings' => 'dpi_homepage_intro_message_p1_0012'
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_p2_control_0016',
        'method' => 'add_control',
        'settings' => [
          'type' => 'textarea',
          'label' => 'Intro Message Paragraph 2',
          'section' => 'dpi_homepage_intro_0002',
          'settings' => 'dpi_homepage_intro_message_p2_0013'
        ]
      ],
      [
        'id' => 'dpi_homepage_intro_message_p3_control_0018',
        'method' => 'add_control',
        'settings' => [
          'type' => 'textarea',
          'label' => 'Intro Message Paragraph 3',
          'section' => 'dpi_homepage_intro_0002',
          'settings' => 'dpi_homepage_intro_message_p3_0017'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_link_control_0020',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Mass Times Link',
          'section' => 'dpi_homepage_featured_links_0018',
          'settings' => 'dpi_homepage_mass_times_link_0019'
        ]
      ],
      [
        'id' => 'dpi_homepage_bulletins_link_control_0025',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Bulletins Link',
          'section' => 'dpi_homepage_featured_links_0018',
          'settings' => 'dpi_homepage_bulletins_link_0021'
        ]
      ],
      [
        'id' => 'dpi_homepage_donations_link_control_0026',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Donations Link',
          'section' => 'dpi_homepage_featured_links_0018',
          'settings' => 'dpi_homepage_donations_link_0022'
        ]
      ],
      [
        'id' => 'dpi_homepage_join_parish_link_control_0027',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Join Parish Link',
          'section' => 'dpi_homepage_featured_links_0018',
          'settings' => 'dpi_homepage_join_parish_link_0023'
        ]
      ],
      [
        'id' => 'dpi_homepage_live_stream_link_control_0031',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Live Stream Link',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_live_stream_link_0029'
        ]
      ],
      [
        'id' => 'dpi_homepage_live_stream_img_control_0032',
        'method' => 'add_control',
        'settings' => [
          'type' => 'image',
          'label' => 'Live Stream Cover Image',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_live_stream_img_0030'
        ]
      ],
      [
        'id' => 'dpi_homepage_homilies_link_control_0034',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Rector\'s Desk Link',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_homilies_link_0032'
        ]
      ],
      [
        'id' => 'dpi_homepage_homilies_img_control_0035',
        'method' => 'add_control',
        'settings' => [
          'type' => 'image',
          'label' => 'Rector\'s Desk Cover Image',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_homilies_img_0033'
        ]
      ],
      [
        'id' => 'dpi_homepage_mpa_link_control_0037',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Our App Link',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_mpa_link_0036'
        ]
      ],
      [
        'id' => 'dpi_homepage_mpa_img_control_0038',
        'method' => 'add_control',
        'settings' => [
          'type' => 'image',
          'label' => 'Our App Cover Image',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_mpa_img_0037'
        ]
      ],
      [
        'id' => 'dpi_homepage_podcasts_link_control_0041',
        'method' => 'add_control',
        'settings' => [
          'type' => 'text',
          'label' => 'Podcasts Link',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_podcasts_link_0039'
        ]
      ],
      [
        'id' => 'dpi_homepage_podcasts_img_control_0042',
        'method' => 'add_control',
        'settings' => [
          'type' => 'image',
          'label' => 'Podcasts Cover Image',
          'section' => 'dpi_homepage_media_center_0028',
          'settings' => 'dpi_homepage_podcasts_img_0040'
        ]
      ]
    ]
  ];

  public function __construct() {
    add_action( 'customize_register', [$this, 'init'] );
    add_action( 'customize_preview_init', [$this, 'customizer_js'] );
  }

  public function init( $wp_customize ) {
    $this->manager = $wp_customize;
    $this->recursive_register( $this->customizer );
    $this->remove_defaults();
  }

  public function recursive_register( $arr ) {
    $iterator = new RecursiveArrayIterator( $arr );

    while ( $iterator->valid() ) {
      if ( $iterator->hasChildren() ) {
        foreach( $iterator->getChildren() as $k => $component ) {
          $this->add_component( $component );
        }
      }
      $iterator->next();
    }
  }

  public function add_component( $component ) {
    $type = array_key_exists( 'type', $component['settings'] ) ? $component['settings']['type'] : '';
    $selective_refresh = array_key_exists( 'selective_refresh', $component );
    $js_refresh = array_key_exists( 'js_refresh', $component );

    if ( $selective_refresh ) {
      $this->add_partial( $component );
    } else if ( $js_refresh ) {
      $component['js_refresh']['id'] = $component['id'];
      array_push( $this->localize, $component['js_refresh'] );
    }

    switch ( $type ) {
      case 'color':
        $this->manager->add_control(
          new WP_Customize_Color_Control(
            $this->manager,
            $component['id'],
            $component['settings']
          )
        );
        break;
      case 'image':
        $this->manager->add_control(
          new WP_Customize_Image_Control(
            $this->manager,
            $component['id'],
            $component['settings']
           )
        );
        break;
      case 'image_crop':
        $this->manager->add_control(
          new WP_Customize_Cropped_Image_Control(
            $this->manager,
            $component['id'],
            $component['settings']
          )
        );
        break;
      case 'file':
        $this->manager->add_control(
          new WP_Customize_Media_Control(
            $this->manager,
            $component['id'],
            $component['settings']
          )
        );
      case 'custom':
        $this->manager->add_control(
          new WP_Customize_Control(
            $this->manager,
            $component['id'],
            $component['settings']
          )
        );
      default:
        call_user_func_array(
          [$this->manager, $component['method']],
          [$component['id'], $component['settings']]
        );
        break;
    }
  }

  public function add_partial( $component ) {
    $id = $component['id'];
    $component['selective_refresh']['settings'] = $id;

    $component['selective_refresh']['render_callback'] = function() use ( $id ) {
      return get_theme_mod( $id );
    };

    $this->manager->selective_refresh->add_partial( $id, $component['selective_refresh'] );
  }

  public function remove_defaults() {
    $defaults = [
      'colors',
      'header_image',
      'background_image',
      'static_front_page',
      'custom_css',
      'themes',
    ];

    foreach( $defaults as $default ) {
      $this->manager->remove_section( $default );
    }

    // can't remove the menus or widget panels with remove_panel(), thanks wordpress...
    remove_action( 'customize_controls_enqueue_scripts', [$this->manager->nav_menus, 'enqueue_scripts'] );
    remove_action( 'customize_register', [$this->manager->nav_menus, 'customize_register'], 11 );
    remove_filter( 'customize_dynamic_setting_args', [$this->manager->nav_menus, 'filter_dynamic_setting_args'] );
    remove_filter( 'customize_dynamic_setting_class', [$this->manager->nav_menus, 'filter_dynamic_setting_class'] );
    remove_action( 'customize_controls_print_footer_scripts', [$this->manager->nav_menus, 'print_templates'] );
    remove_action( 'customize_controls_print_footer_scripts', [$this->manager->nav_menus, 'available_items_template'] );
    remove_action( 'customize_preview_init', [$this->manager->nav_menus, 'customize_preview_init'] );

    remove_action( 'customize_controls_enqueue_scripts', [$this->manager->widgets, 'enqueue_scripts'] );
    remove_action( 'customize_register', [$this->manager->widgets, 'customize_register'], 11 );
    remove_filter( 'customize_dynamic_setting_args', [$this->manager->widgets, 'filter_dynamic_setting_args'] );
    remove_filter( 'customize_dynamic_setting_class', [$this->manager->widgets, 'filter_dynamic_setting_class'] );
    remove_action( 'customize_controls_print_footer_scripts', [$this->manager->widgets, 'print_templates'] );
    remove_action( 'customize_controls_print_footer_scripts', [$this->manager->widgets, 'available_items_template'] );
    remove_action( 'customize_preview_init', [$this->manager->widgets, 'customize_preview_init'] );
  }

  public function customizer_js() {
    wp_register_script( 'dpi-customizer-js', asset_path( 'scripts/js/dpiCustomizer.js' ), ['jquery', 'customize-preview'], '1.0.0', true );
    wp_localize_script( 'dpi-customizer-js', 'dpi_cust_local', json_encode( $this->localize ) );
    wp_enqueue_script( 'dpi-customizer-js' );
  }
}

new DPI_Customizer();
