<?php

namespace Spine\Scripts\php;

class Homilies {

    public function init() {
        add_action('init', [$this, 'createPostType']);
    }

    public function createPostType() {
        if (post_type_exists('homilies')) return;

        $labels = [
            'name' => _x('Homilies', 'post type general name'),
            'singular_name' => _x('Homily', 'post type singular name'),
            'add_new_item' => __('Add New Homily', 'Post'),
            'new_item' => __('New Homily'),
            'edit_item' => __('Edit Homily'),
            'all_items' => __('All Homilies'),
            'view_item' => __('View Homily'),
            'search_items' => __('Search Homilies'),
            'not_found' => __('No Homilies Found'),
            'not_found_in_trash' => __('No Homilies found in the trash.'),
            'parent_item_colon' => '',
            'menu_name' => 'Homilies'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => 'homilies'],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'show_in_rest' => true,
            'rest_base' => 'homily'
        ];

        register_post_type('homilies', $args);
        flush_rewrite_rules();
    }
}

$ffCpt = new Homilies();
$ffCpt->init();