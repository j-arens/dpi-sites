<?php

namespace Spine\Scripts\php;

class Youth {

    public function init() {
        add_action('init', [$this, 'createPostType']);
    }

    public function createPostType() {
        if (post_type_exists('youth')) return;

        $labels = [
            'name' => _x('Post', 'post type general name'),
            'singular_name' => _x('Post', 'post type singular name'),
            'add_new_item' => __('Add New Post', 'Post'),
            'new_item' => __('New Post'),
            'edit_item' => __('Edit Post'),
            'all_items' => __('All Posts'),
            'view_item' => __('View Post'),
            'search_items' => __('Search Posts'),
            'not_found' => __('No Posts Found'),
            'not_found_in_trash' => __('No Posts found in the trash.'),
            'parent_item_colon' => '',
            'menu_name' => 'Youth'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => 'youth'],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'show_in_rest' => true,
            'rest_base' => 'youth'
        ];

        register_post_type('youth', $args);
        flush_rewrite_rules();
    }
}

$ffCpt = new Youth();
$ffCpt->init();