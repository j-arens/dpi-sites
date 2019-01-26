<?php

namespace Spine\scripts\php;

class HomeNews {

    private $postTypeName = 'news';

    public function createPostType() {
        if (post_type_exists($this->postTypeName)) return;

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
            'show_in_rest' => true,
            'rest_base' => str_replace(' ', '-', $this->postTypeName)
        ];

        register_post_type($this->postTypeName, $args);
        flush_rewrite_rules();
    }

    private function getRandomThumbnail() {
        return get_template_directory_uri() . '/assets/images/news-placeholder-' . array_rand(array_flip([1, 2, 3, 4])) . '.jpg';
    }

    private function getThumbnail($post) {
        $thumbnailUrl = get_the_post_thumbnail_url($post->ID, 'medium');

        if (!$thumbnailUrl) {
            return $this->getRandomThumbnail();
        }

        return $thumbnailUrl;
    }

    public function getPosts($quantity = -1) {
        global $post;
        $placeholderContent = [];
        $posts = get_posts([
            'numberposts' => $quantity,
            'post_type' => $this->postTypeName,
            'post_status' => 'publish'
        ]);

        $postContent = array_map(function($post) {
            setup_postdata($post);

            return [
                'link' => get_the_permalink($post->ID),
                'title' => wp_trim_words(get_the_title($post->ID), 3, '...'),
                'content' => preg_replace('/(?=\[)(.*)(?>\])/', '', wp_trim_words($post->post_content, 30, '...<span class="home-news__text-link">Read More></span>')),
                'thumbnailUrl' => $this->getThumbnail($post),
                'hoverFX' => true
            ];

        }, $posts);

        if (count($postContent) < 3) {
            $counter = 0;

            while($counter < (3 - count($postContent))) {
                $placeholderContent[] = [
                    'link' => '',
                    'title' => 'Coming Soon...',
                    'content' => 'Check back here soon for more news and events!',
                    'thumbnailUrl' => $this->getRandomThumbnail(),
                    'hoverFX' => false
                ];

                $counter++;
            }
        }

        wp_reset_postdata();
        return array_merge($postContent, $placeholderContent);
    }
}

add_action('init', function() {
    $HomeNews = new HomeNews();
    $HomeNews->createPostType();
});