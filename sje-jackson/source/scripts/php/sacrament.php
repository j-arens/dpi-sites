<?php

namespace Spine\Scripts\php;

class Sacrament {

    public function init() {
        add_action('init', [$this, 'createPostType']);
    }

    public function createPostType() {
        if (post_type_exists('sacraments')) return;

        $labels = [
            'name' => _x('Sacrament', 'post type general name'),
            'singular_name' => _x('Sacrament', 'post type singular name'),
            'add_new_item' => __('Add New Sacrament', 'Post'),
            'new_item' => __('New Sacrament'),
            'edit_item' => __('Edit Sacrament'),
            'all_items' => __('All Sacraments'),
            'view_item' => __('View Sacrament'),
            'search_items' => __('Search Sacraments'),
            'not_found' => __('No Sacraments Found'),
            'not_found_in_trash' => __('No Sacraments found in the trash.'),
            'parent_item_colon' => '',
            'menu_name' => 'Sacrament'
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => 'sacraments'],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'show_in_rest' => true,
            'rest_base' => 'Sacrament'
        ];

        register_post_type('sacraments', $args);
        flush_rewrite_rules();
    }
}

$ffCpt = new Sacrament();
$ffCpt->init();