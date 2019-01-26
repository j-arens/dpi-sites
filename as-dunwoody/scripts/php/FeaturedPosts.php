<?php

namespace Spine\scripts\php;

class FeaturedPosts {

    /**
    * Get at most 3 posts of type post
    * @return{array} posts
    */
    public function getWpPosts() {
        return get_posts([
            'post_type' => 'post',
            'numberposts' => 3,
            'post_status' => 'publish'
        ]);
    }

    /**
    * Get a post thumbnail url
    * @param{object} $post
    * @return{string} $thumbnailUrl
    */
    public function getThumbnailUrl($post) {
        $thumbnailUrl = get_the_post_thumbnail_url($post->ID, 'medium');

        if (!$thumbnailUrl) {
            return [
                'url' => get_template_directory_uri() . '/assets/images/featured-placeholder-01.png',
                'trim' => true
            ];
        }
        
        return [
            'url' => $thumbnailUrl,
            'trim' => false
        ];
    }

    /**
    * Transform wp posts into a nice & neat array
    * @param{array} $posts
    * @return{array} $posts
    */
    public function parsePosts(Array $posts) {
        return array_map(function($post) {

            $thumbnail = $this->getThumbnailUrl($post);
            
            return [
                'link' => get_the_permalink($post->ID),
                'title' => wp_trim_words(get_the_title($post->ID), 3, '...'),
                'date' => get_post_time('U', false, $post->ID),
                'excerpt' => wp_trim_words($post->post_content, 15, '...'),
                'thumbnail' => $thumbnail['url'],
                'trim' => $thumbnail['trim']
            ];

        }, $posts);
    }

    /**
    * Get an array of 3 featured post items
    * @return{array} $posts
    */
    public function getFeaturedPosts() {
        $posts = $this->parsePosts($this->getWpPosts());

        if (count($posts) < 3) {
            while(count($posts) < 3) {
                $posts[] = [
                    'link' => '',
                    'title' => 'Coming Soon...',
                    'date' => strtotime('now'),
                    'excerpt' => 'Check back here soon for more news and events!',
                    'thumbnail' => get_template_directory_uri() . '/assets/images/featured-placeholder-01.png',
                    'trim' => true
                ];
            }
        }

        return $posts;
    }
}