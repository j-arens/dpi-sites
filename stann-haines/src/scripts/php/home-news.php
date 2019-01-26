<?php

class DPI_News {

    public function __construct() {
        add_action('init', [$this, 'createCat']);
        add_action('init', [$this, 'createCpt']);
        add_shortcode('dpi_news', [$this, 'shortcodeHandler']);
    }

    public function createCat() {
        if (!post_type_exists('news')) {
            $labels = [
                'name' => _x('Categories', 'taxonomy general name'),
                'singular_name' => _x('Categorie', 'taxonomy singular name'),
                'search_items' => __('Search Categories'),
                'all_items' => __('All Categories'),
                'edit_item' => __('Edit Category'),
                'update_item' => __('Update Category'),
                'add_new_item' => __('Add New Category'),
                'new_item_name' => __('New Category Name'),
                'menu_name' => __('Categories')
            ];

            $args = [
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'note'],
                'show_in_rest' => true,
                'rest_base' => 'pastors-notes'
            ];

            register_taxonomy('news_categories', 'news', $args);
            register_taxonomy_for_object_type('news_categories', 'news');
        }
    }

    public function createCpt() {
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
                'not_found' => __('No News Posts found'),
                'not_found_in_trash' => __('No news posts found in the trash.'),
                'parent_item_colon' => '',
                'menu_name' => 'News'
            ];

            $args = [
                'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => false,
                'rewrite' => ['slug' => 'news'],
                'supports' => ['title', 'editor', 'revisions'],
                'taxonomies' => ['news_categories'],
                'has_archive' => true,
                'show_in_rest' => true,
                'rest_base' => 'news'
            ];

            register_post_type('news', $args);
            flush_rewrite_rules();
        }
    }

    public function shortcodeHandler() {
        return $this->generateHtml($this->generateContent());
    }

    public function generateContent() {
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
                'date_gmt' => $post->post_date_gmt,
                'date_formatted' => get_the_date('l, F jS', $post->ID),
                'content' => wp_trim_words($post->post_content, 17, '...')
            ];
        }, $posts);

        if (count($postContent) < 4) {
            $counter = 0;

            while ($counter < (4 - count($postContent))) {
                array_push($placeholderContent, [
                    'link' => false,
                    'title' => 'Coming Soon...',
                    'date_gmt' => gmdate('Y-m-d H:i:s'),
                    'date_formatted' => date('l, F jS'),
                    'content' => 'Check back here soon for more news and events!'         
                ]);
                $counter++;
            }
        }

        return array_merge($postContent, $placeholderContent);
    }

    public function generateHtml($content) {
        $html = '';

        foreach($content as $article) {
            $html .= '
                <article class="home-news-article col-md-6 col-lg-3">
                    <time class="home-news-article--date font-light" datetime="' . $article['date_gmt'] . '">' . $article['date_formatted'] . '</time>
                    <p class="home-news-article--title font-black">' . $article['title'] . '</p>
                    <p class="home-news-article--excerpt">' . $article['content'] . '</p>
                    <a href="' . ($article['link'] ? $article['link'] : "#") . '" class="home-news-article--link" ' . ($article['link'] ? "" : "style=\"display: none;\"") . '>Read More...</a>
                </article>
            ';
        }

        return $html;
    }
}

new DPI_News();