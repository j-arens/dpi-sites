<?php

namespace Spine\scripts\php;

class Blogs {

    private $postTypes = [
        [
            'slug' => 'frkevins-blog',
            'menu_name' => 'Fr. Kevin\'s Blog'
        ],
        [
            'slug' => 'frmalleys-blog',
            'menu_name' => 'Fr. Malley\'s Blog'
        ]
    ];

    private function createPostType($postType) {
        if (post_type_exists($postType['slug'])) return;

        $labels = [
            'name' => _x('News', 'post type general name'),
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
            'menu_name' => ucfirst($postType['menu_name'])
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_nav_menus' => false,
            'rewrite' => ['slug' => str_replace(' ', '-', $postType['slug'])],
            'supports' => ['title', 'thumbnail', 'editor', 'revisions'],
            'show_in_rest' => true,
            'rest_base' => str_replace(' ', '-', $postType['slug'])
        ];

        register_post_type($postType['slug'], $args);
        flush_rewrite_rules();
    }

    public function init() {
        foreach($this->postTypes as $postType) {
            $this->createPostType($postType);
        }
    }

}

add_action('init', function() {
    $Blogs = new Blogs();
    $Blogs->init();
});