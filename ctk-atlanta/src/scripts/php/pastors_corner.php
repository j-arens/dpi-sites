<?php

class DPI_Pastors_Corner {

  public function __construct() {
    add_action( 'init', [$this, 'create_cpt'] );
  }

  public function create_cpt() {
    if ( !post_type_exists( 'pastors_corner' ) ) {
      $labels = [
        'name' => _x( 'Post', 'post type general name' ),
        'singular_name' => _x( 'Post', 'post type singular name' ),
        'add_new' => _x( 'Add New', 'Post' ),
        'add_new_item' => __( 'Add New Post' ),
        'edit_item' => __( 'Edit Post' ),
        'new_item' => __( 'New Post' ),
        'all_items' => __( 'All Posts' ),
        'view_item' => __( 'View Posts' ),
        'search_items' => __( 'Search Posts' ),
        'not_found' => __( 'No Posts Found' ),
        'not_found_in_trash' => __( 'No Posts found in the Trash' ),
        'parent_item_colon' => '',
        'menu_name' => 'Pastor\'s Corner'
      ];

      $args = [
        'labels' => $labels,
        'description' => 'Posts',
        'public' => true,
        'show_in_nav_menus' => false,
        'rewrite' => ['slug' => 'pastors_corner'],
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'show_in_rest' => true,
        'rest_base' => 'pastors-corner'
      ];

      register_post_type( 'pastors_corner', $args );
      flush_rewrite_rules();
    }
  }
}

new DPI_Pastors_Corner;
