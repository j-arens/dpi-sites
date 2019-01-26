<?php

namespace Spine\Scripts\php;

class FaithFormation {

    public function init() {
        add_action('init', [$this, 'createPostType']);
    }

    public function createPostType() {
        if (post_type_exists('faith-formation')) return;

        $labels = [
            'name' => _x('FF Posts', 'post type general name'),
            'singular_name' => _x('FF Post', 'post type singular name'),
            'add_new_item' => __('Add New', 'Post'),
            'new_item' => __('New Post'),
            'edit_item' => __('Edit Post'),
            'all_items' => __('All Posts'),
            'view_item' => __('View Post'),
            'search_items' => __('Search Posts'),
            'not_found' => __('No FF Posts Found'),
            'not_found_in_trash' => __('No FF posts found in the trash.'),
            'parent_item_colon' => '',
            'menu_name' => 'Faith Formation'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => 'faith-formation'],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'show_in_rest' => true,
            'rest_base' => 'faith-formation'
        ];

        register_post_type('faith-formation', $args);
        flush_rewrite_rules();
    }
}

$ffCpt = new FaithFormation();
$ffCpt->init();