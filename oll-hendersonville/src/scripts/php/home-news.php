<?php

class DPI_News {

    public function __construct() {
        add_action('init', [$this, 'createPostType']);
        add_shortcode('dpi_news', [$this, 'shortcodeHandler']);
    }

    public function createPostType() {
        if (!post_type_exists('news')) {
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
                'title' => wp_trim_words(get_the_title($post->ID), 2, '...'),
                'content' => wp_trim_words($post->post_content, 17, '...'),
                'thumbnail_url' => get_the_post_thumbnail_url($post->ID, 'medium'),
                'hover_fx' => true
            ];
        }, $posts);

        if (count($postContent) < 4) {
            $counter = 0;

            while($counter < (4 - count($postContent))) {
                $placeholderContent[] = [
                    'link' => false,
                    'title' => 'Coming Soon...',
                    'content' => 'Check back here soon for more news and events!',
                    'thumbnail_url' => false,
                    'hover_fx' => false
                ];
                $counter++;
            }
        }

        return array_merge($postContent, $placeholderContent);
    }

    private function generateHTML($content) {
        $html = '<ul class="home-news--posts_list">';

        foreach($content as $article) {
            $thumbnail = $article['thumbnail_url'] ? $article['thumbnail_url'] : get_template_directory_uri() . '/assets/images/news-placeholder-01.svg';
            $html .= '
                <li class="home-news--posts_item ' . ($article['hover_fx'] ? "home-news--posts_item-hover-fx" : "") . '">
                    <a href="' . ($article['link'] ? $article['link'] : "#") . '" class="home-news-posts_figure_link ' . ($article['link'] ? "" : "home-news--posts_link-disabled") . '">
                        <figure class="home-news--posts_item-figure">
                            <span class="home-news--posts_item-thumbnail" style="background-image: url(' . esc_url($thumbnail) . ')"></span>
                            <figcaption class="home-news--posts_item-caption">
                                <p class="home-news--posts_item_caption-title">Read More ></p>
                            </figcaption>
                        </figure>
                    </a>
                    <p class="home-news--posts_item-title font-yk">' . $article['title'] . '</p>
                    <p class="home-news--posts_item-excerpt">' . $article['content'] . '</p>
                    <a href="' . ($article['link'] ? $article['link'] : "#") . '" class="home-news--posts_item-link font-bold ' . ($article['link'] ? "" : "home-news--posts_link-hidden") . '">Read More ></a>
                </li>
            ';
        }

        return $html . '</ul>';
    }

    public function shortcodeHandler() {
        return $this->generateHTML($this->generateContent());
    }
}

new DPI_News();