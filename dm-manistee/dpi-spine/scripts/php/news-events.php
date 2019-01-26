<?php

class DPI_News_Events {

    public function __construct() {
        add_action('init', [$this, 'createCpt']);
        add_shortcode('dpi_news_events', [$this, 'shortcodeHandler']);
    }

    public function createCpt() {
        if (!post_type_exists('news')) {
            $labels = [
                'name' => _x('News', 'post type general name'),
                'singular_name' => _x('News Article', 'post type singular name'),
                'add_new' => __('Add New', 'Article'),
                'add_new_item' => __('Add New Article'),
                'edit_item' => __('Edit News Article'),
                'new_item' => __('New Article'),
                'all_items' => __('All News Articles'),
                'view_item' => __('View Article'),
                'search_items' => __('Search News Articles'),
                'not_found' => __('No News Articles Found'),
                'not_found_in_trash' => __('No News Articles found in the trash.'),
                'parent_item_colon' => '',
                'menu_name' => 'News'
            ];

            $args = [
                'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => false,
                'rewrite' => ['slug' => 'news'],
                'supports' => ['title', 'editor', 'thumbnail'],
                'has_archive' => true,
                'show_in_rest' => true,
                'rest_base' => 'news'
            ];

            register_post_type('news', $args);
            flush_rewrite_rules();
        }
    }

    public function shortcodeHandler() {
        $content = $this->generateContent();
        return $this->generateHtml($content);
    }

    public function generateContent() {
        global $post;
        $demoContent = [];

        $posts = get_posts([
            'numberposts' => 4,
            'post_type' => 'news',
            'post_status' => 'publish'
        ]);

        $postContent = array_map(function($post) {
            setup_postdata($post);
            return [
                'img' => get_the_post_thumbnail_url($post->ID, 'large'),
                'img_hover_class' => 'hover-link',
                'link' => get_the_permalink($post->ID),
                'link_class' => '',
                'title' => get_the_title($post->ID),
                'date_gmt' => $post->post_date_gmt,
                'date' => get_the_date('F j, Y', $post->ID),
                'content' => wp_trim_words(get_the_content($post->ID), 15, '...')
            ];
        }, $posts);

        if (count($postContent) < 4) {
            $counter = 0;

            while($counter < (4 - count($postContent))) {
                array_push($demoContent, [
                    'img' => '',
                    'img_hover_class' => '',
                    'link' => false,
                    'link_class' => 'hidden',
                    'title' => 'More News Coming Soon.',
                    'date_gmt' => gmdate('Y-m-d H:i:s'),
                    'date' => date('F j, Y'),
                    'content' => 'Check back here soon for more news and events!'
                ]);
                $counter++;
            }
        }

        return array_merge($postContent, $demoContent);
    }

    public function generateHtml( $posts ) {
        $featured = '<div class="home-events-featured-container col-xs-12 col-xl-6 col-xw-5 offset-xw-1">';
        $archive = '<div class="home-events-archive-container col-xs-12 col-xl-6 col-xw-5">';

        array_walk($posts, function($post, $idx) use (&$featured, &$archive) {

            if (empty($post['img'])) {
                $post['img'] = get_template_directory_uri() . '/assets/images/news-placeholder-' . ($idx + 1) . '.jpg';
            }

            if ($idx === 0) {
                $featured .= '
                    <article class="home-events-featured-article">
                        <div class="featured-article-img ' . $post['img_hover_class'] . '" style="background-image: url(' . $post['img'] . ')">
                            <a class="article-img-link ' . $post['link_class'] . '" href="' . $post['link'] . '"></a>
                        </div>
                        <div class="featured-article-content">
                            <header class="article-header">
                                <p class="article-title">' . $post['title'] . '</p>
                                <time class="article-date maven-pro" datetime="' . $post['date_gmt'] . '">' . $post['date'] . '</time>
                            </header>
                            <p class="article-excerpt maven-pro">' . $post['content'] . '</p>
                            <a href="' . $post['link'] . '" class="moretag maven-pro ' . $post['link_class'] . '">Read More...</a>
                        </div>
                    </article>
                ';
            } else {
                $archive .= '
                    <article class="home-events-archive-article">
                        <div class="archive-article-img ' . $post['img_hover_class'] . '" style="background-image: url(' . $post['img'] . ')">
                            <a class="article-img-link ' . $post['link_class'] . '" href="' . $post['link'] . '"></a>
                        </div>
                        <div class="archive-article-content">
                            <header class="article-header">
                                <p class="article-title">' . $post['title'] . '</p>
                                <time class="article-date maven-pro" datetime="' . $post['date_gmt'] . '">' . $post['date'] . '</time>
                            </header>
                            <p class="article-excerpt maven-pro">' . $post['content'] . '</p>
                            <a href="' . $post['link'] . '" class="moretag maven-pro ' . $post['link_class'] . '">Read More...</a>
                        </div>
                    </article>
                ';
            }
        });

        $featured .= '</div>';
        $archive .= '</div>';

        return $featured . $archive;
    }
}

new DPI_News_Events();