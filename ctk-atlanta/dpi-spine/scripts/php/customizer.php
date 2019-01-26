<?php

function dpi_add_setting( $wp_customize ) {
  // remove default wp junk
  $sections = [
    'title_tagline',
    'colors',
    'header_image',
    'background_image',
    'static_front_page',
    'custom_css',
  ];

  foreach( $sections as $section ) {
    $wp_customize->remove_section( $section );
  }

  // remove menus panel
  remove_action( 'customize_controls_enqueue_scripts', array( $wp_customize->nav_menus, 'enqueue_scripts' ) );
  remove_action( 'customize_register', array( $wp_customize->nav_menus, 'customize_register' ), 11 );
  remove_filter( 'customize_dynamic_setting_args', array( $wp_customize->nav_menus, 'filter_dynamic_setting_args' ) );
  remove_filter( 'customize_dynamic_setting_class', array( $wp_customize->nav_menus, 'filter_dynamic_setting_class' ) );
  remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
  remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'available_items_template' ) );
  remove_action( 'customize_preview_init', array( $wp_customize->nav_menus, 'customize_preview_init' ) );

  $wp_customize->add_section('test_section', [
    'title' => 'test_section',
    'description' => 'test section',
    'priority' => 160,
    'capability' => 'manage_options',
    'theme_supports' => ''
  ]);

  $wp_customize->add_setting('test_setting', [
    'type' => 'theme_mod', // theme_mod or option, options are added to wp-admin/options.php and persist regardless of the current theme
    'capability' => 'manage_options', // normal caps
    'theme_supports' => '', // rarely needed according to docs
    'transport' => 'postMessage', // or refresh, postMessage will need custom js handlers but offers the best ux
    'default' => '', // default value
  ]);

  $wp_customize->add_control('test_control', [
    'type' => 'date',
    'priority' => 160,
    'section' => 'test_section',
    'settings' => 'test_setting',
    'label' => 'test_control',
    'description' => 'test description',
    'active_callback' => function() {return is_front_page();}
  ]);
}

add_action( 'customize_register', 'dpi_add_setting' );
