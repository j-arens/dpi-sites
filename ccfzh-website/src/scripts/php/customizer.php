<?php

// function dpi_customizer_cpt() {
//   $labels = [
//     'name' => _x('Custom Area', 'post type general name'),
//     'singular_name' => _x('Custom Area', 'post type singular name'),
//     'add_new' => _x('Add New Custom Area', 'Link Box'),
//     'add_new_item' => __('Add New Custom Area'),
//     'edit-item' => __('Edit Custom Area'),
//     'new_item' => __('New Custom Area'),
//     'all_items' => __('All Custom Areas'),
//     'view_item' => __('View Custom Area'),
//     'search_items' => __('Search Custom Areas'),
//     'not_found' => __('No Custom Areas Found'),
//     'not_found_in_trash' => __('No Custom Areas found in the Trash'),
//     'parent_item_colon' => '',
//     'menu_name' => 'Customizer'
//   ];
//
//   $args = [
//     'labels' => $labels,
//     'public' => false,
//     'show_ui' => true,
//     'show_in_admin_bar' => false,
//     'capabilities' => [
//       'edit_post'          => 'update_core',
//       'read_post'          => 'update_core',
//       'delete_post'        => 'update_core',
//       'edit_posts'         => 'update_core',
//       'edit_others_posts'  => 'update_core',
//       'delete_posts'       => 'update_core',
//       'publish_posts'      => 'update_core',
//       'read_private_posts' => 'update_core'
//     ],
//     'supports' => ['title', 'thumbnail', 'editor', 'custom-fields'],
//     'show_in_rest' => true,
//     'rest_base' => 'dpi_customizer'
//   ];
//
//   register_post_type( 'dpi_customizer', $args );
// }
//
// add_action( 'init', 'dpi_customizer_cpt' );

class SP_Customizer {

  protected $customizer;

  public function __construct() {
    $this->customizer = new WP_Customize_Manager;
    add_action( 'customize_register', [ $this, 'customize_init' ] );
  }

  public function customize_init() {
    $this->remove_default();
    $this->add_panels();
  }

  private function remove_default() {
    $this->remove( 'panel', 'menus' );
    $this->remove( 'section', ['static_front_page', 'custom_css', 'themes']);
  }

  private function add_panels() {
    $this->customizer->add_panel( 'options_panel', [
        'priority' => 10,
        'capability' => 'moderate_comments',
        'title' => __( 'test panel' ),
        'description' => __( 'test panel desription' )
      ] );

    $this->customizer->add_section( 'homepage_section', [
        'priority' => 100,
        'title' => __( 'Test Title' ),
        'description' => __( 'Test Description' ),
        'panel' => 'options_panel'
      ] );

    $this->customizer->add_control( 'test_control', [
        'label' => __( 'Test Control' ),
        'section' => 'homepage_section',
        'type' => 'radio',
        'description' => __( 'test control description' ),
        'choices' => [
            'One' => 'One',
            'Two' => 'Two'
          ],
      ] );
  }

  private function remove( $type, $id ) {
    if ( !empty( $type ) && !empty( $id ) ) {
      if ( is_array( $id ) ) {
        foreach( $id as $single ) {
          $this->customizer->{'remove_' . $type}( $single );
        }
      } else {
        $this->customizer->{'remove_' . $type}( $id );
      }
    } else {
      return false;
    }
  }
}

if ( is_customize_preview() ) {
  $sp_customizer = new SP_Customizer();

  // function dpi_add_control( $wp_customize ) {
  //   $wp_customize->add_control( 'custom_control', [
  //       'label' => __( 'Custom Control' ),
  //       'section' => 'static_front_page',
  //       'type' => 'radio',
  //       'description' => __( 'test control description' ),
  //       'choices' => [
  //           'One' => 'One',
  //           'Two' => 'Two'
  //         ]
  //     ] );
  // }
  //
  // add_action( 'customize_register', 'dpi_add_control' );
}
