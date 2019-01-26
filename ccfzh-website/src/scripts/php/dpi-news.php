<?php

function dpi_news() {
  $labels = [
    'name' => _x('Article', 'post type general name'),
    'singular_name' => _x('Article', 'post type singular name'),
    'add_new' => _x('Add New Article', 'Link Box'),
    'add_new_item' => __('Add New Article'),
    'edit-item' => __('Edit Article'),
    'new_item' => __('New Article'),
    'all_items' => __('All Articles'),
    'view_item' => __('View Article'),
    'search_items' => __('Search Articles'),
    'not_found' => __('No Articles Found'),
    'not_found_in_trash' => __('No Articles found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Front Page News'
  ];

  $args = [
    'labels' => $labels,
    'description' => 'Front Page News',
    'public' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array('slug'=>'dpi_news'),
    'menu-position' => 2,
    'supports' => array('title', 'thumbnail', 'page-attributes', 'editor'),
    'has_archive' => true,
    'show_in_rest' => true,
    'rest_base' => 'dpi_news'
  ];

  register_post_type( 'dpi_news', $args );
}

add_action( 'init', 'dpi_news' );

function dpi_news_shortcode_handler( $atts ) {
  global $post;
  $template = '';

  $args = shortcode_atts([
    'quantity' => 3
  ], $atts );

  $posts = get_posts([
    'numberposts' => $args['quantity'],
    'post_type' => 'dpi_news'
  ]);

  if ( !empty( $posts ) ) {
    $counter = 1;
    foreach( $posts as $post ) {
      setup_postdata( $post );
      $img = get_the_post_thumbnail_url( $post, 'small' );

      if ( empty( $img ) ) {
        $img = get_template_directory_uri() . '/assets/images/article-placeholder-' . $counter . '.jpg';
      }

      $template .= '
        <article>
          <a class="article-link" href="' . get_the_permalink() . '">
            <div class="article-img" style="background-image: url(' . $img . ')"></div>
            <div class="content">
              <span class="article-title">' . wp_trim_words( get_the_title(), 5, '...' ) . '</span>
              <p>' . wp_trim_words( get_the_content(), 7 ) . '</p>
              <a class="read-more" href="' . get_the_permalink() . '">Read More</a>
            </div>
          </a>
        </article>
      ';
      $counter <= 3 ? $counter++ : $counter = 1;
    }
    wp_reset_postdata();
  } else {
    $template = '<div class="no-posts-found">Sorry, there aren\'t any articles to show you at the moment.</div>';
  }

  return $template;
}

add_shortcode( 'dpi_news', 'dpi_news_shortcode_handler' );
