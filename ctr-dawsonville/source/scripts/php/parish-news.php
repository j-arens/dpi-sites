<?php

add_action('init', function() {
    $postTypeName = 'parish-news';

    if (post_type_exists($postTypeName)) return;

    $labels = [
        'name' => _x('News', 'post type general name'),
        'singular_name' => _x('News Post', 'post type singular name'),
        'add_new_item' => __('Add New', 'Post'),
        'edit_item' => __('Edit News Post'),
        'new_item' => __('New Post'),
        'all_items' => __('All News Posts'),
        'view_item' => __('View Post'),
        'search_items' => __('Search News Posts'),
        'not_found' => __('No News Posts Found'),
        'not_found_in_trash' => __('No news posts found in the trash.'),
        'parent_item_colon' => '',
        'menu_name' => 'News'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'rewrite' => ['slug' => 'news'],
        'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
        'has_archive' => true,
        'show_in_rest' => true,
        'rest_base' => $postTypeName
    ];

    register_post_type($postTypeName, $args);
    flush_rewrite_rules();
});

