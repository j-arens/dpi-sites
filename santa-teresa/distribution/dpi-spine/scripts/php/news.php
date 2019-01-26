<?php

namespace Spine\Scripts\PHP;

class News {
    
    public function __construct() {
        $this->createPostType();
        add_shortcode('dpi_news', [$this, 'shortcodeHandler']);
    }
    
    public function createPostType() {
        if (post_type_exists('news')) return;
        
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
            'rest_base' => 'news'
        ];
        
        register_post_type('news', $args);
        flush_rewrite_rules();
    }
    
    private function generateContent() {
        global $post;
        $placeholderContent = [];
        
        $posts = get_posts([
            'numberposts' => 4,
            'post_type' => 'news',
            'post_status' => 'publish'
        ]);
        
        $postContent = array_map(function($post) {
            setup_postdata($post);
            
            return [
                'link' => get_the_permalink($post->ID),
                'title' => wp_trim_words(get_the_title($post->ID, 3, '...')),
                'excerpt' => wp_trim_words($post->post_content, 17, '...'),
                'thumbnail_url' => get_the_post_thumbnail_url($post->ID, 'large'),
                'hover_fx' => true
            ];
            
        }, $posts);
        
        if (count($postContent) < 4) {
            $counter = 0;
            
            while($counter < (4 - count($postContent))) {
                $placeholderContent[] = [
                    'link' => false,
                    'title' => 'Coming Soon...',
                    'excerpt' => 'Check back here soon for more news and events!',
                    'thumbnail_url' => false,
                    'hover_fx' => false
                ];
                
                $counter++;
            }
        }
        
        return array_merge($postContent, $placeholderContent);
    }
    
    private function generateHTML($posts) {
        $html = '<ul class="parish-news__list">';
        
        foreach($posts as $post) {
            $thumbnail = $post['thumbnail_url'] ? $post['thumbnail_url'] : get_template_directory_uri() . '/assets/images/news-placeholder.jpg';
            
            $html .= '
                <li class="parish-news__item">
                    <a 
                        href="' . $post['link'] . '" 
                        class="parish-news__image ' . ($post['hover_fx'] ? "parish-news__hover-fx" : "") . '" 
                        style="background-image: url(' . $thumbnail . ')">
                    </a>
                    <p class="parish-news__title">' . $post['title'] . '</p>
                    <p class="parish-news__excerpt">' . $post['excerpt'] . '</p>
                    <a href="' . $post['link'] . '" class="parish-news__link" style="' . ($post['link'] ? "" : "display: none") . '">
                        Read More' . file_get_contents(get_template_directory() . '/templates/svg/arrow-right.php') . '
                    </a>
                </li>
            ';
        }
        
        return $html . '</ul>';
    }
    
    public function shortcodeHandler() {
        return $this->generateHTML($this->generateContent());
    }
}

add_action('init', function() {
    $newsPosts = new News(); 
});