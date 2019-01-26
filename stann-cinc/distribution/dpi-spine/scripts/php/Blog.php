<?php

namespace Spine\scripts\php;

class Blog {

    private $postTypeName = 'blog';

    public function createPostType() {
        if (post_type_exists($this->postTypeName)) return;

        $labels = [
            'name' => _x('Blog', 'post type general name'),
            'singular_name' => _x('Post', 'post type singular name'),
            'add_new_item' => __('Add New Post', 'Post'),
            'new_item' => __('New Post'),
            'edit_item' => __('Edit Post'),
            'all_items' => __('All Posts'),
            'view_item' => __('View Post'),
            'search_items' => __('Search Posts'),
            'not_found' => __('No Posts Found'),
            'not_found_in_trash' => __('No posts found in the trash.'),
            'parent_item_colon' => '',
            'menu_name' => ucfirst($this->postTypeName)
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => str_replace(' ', '-', $this->postTypeName)],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'taxonomies' => ['category'],
            'show_in_rest' => true,
            'rest_base' => str_replace(' ', '-', $this->postTypeName)
        ];

        register_post_type($this->postTypeName, $args);
        flush_rewrite_rules();
    }

}

add_action('init', function() {
    $Blog = new Blog();
    $Blog->createPostType();
});