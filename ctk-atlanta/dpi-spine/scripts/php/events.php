<?php

class DPI_Parish_Events {

  public function __construct() {
    add_action( 'init', [$this, 'create_cpt'] );
    add_shortcode( 'dpi_parish_events', [$this, 'shortcode_handler'] );
  }

  public function create_cpt() {
    if ( !post_type_exists( 'parish_events' ) ) {
      $labels = [
        'name' => _x( 'Event', 'post type general name' ),
        'singular_name' => _x( 'Event', 'post type singular name' ),
        'add_new' => _x( 'Add New', 'Event' ),
        'add_new_item' => __( 'Add New Event' ),
        'edit_item' => __( 'Edit Event' ),
        'new_item' => __( 'New Event' ),
        'all_items' => __( 'All Events' ),
        'view_item' => __( 'View Event' ),
        'search_items' => __( 'Search Events' ),
        'not_found' => __( 'No Events Found' ),
        'not_found_in_trash' => __( 'No Events found in the Trash' ),
        'parent_item_colon' => '',
        'menu_name' => 'Events'
      ];

      $args = [
        'labels' => $labels,
        'description' => 'Events',
        'public' => true,
        'show_in_nav_menus' => false,
        'rewrite' => ['slug' => 'parish_events'],
        'supports' => ['title', 'thumbnail', 'editor'],
        'has_archive' => true,
        'show_in_rest' => true,
        'rest_base' => 'parish-events'
      ];

      register_post_type( 'parish_events', $args );
      flush_rewrite_rules();
    }
  }

  public function shortcode_handler( $atts ) {
    $args = shortcode_atts([
      'max_events' => 3,
      'layout' => 'homepage'
    ], $atts);

    $posts = get_posts([
      'numberposts' => $args['max_events'],
      'post_type' => 'parish_events'
    ]);

    return $this->generate_html( $posts, $args['layout'] );
  }

  public function generate_html( $posts, $layout ) {
    if ( empty( $posts ) ) {
      $html = '
        <div class="event-empty">Sorry, there aren\'t any events to show you right now.</div>
      ';
    } else {
      global $post;

      switch ( $layout ) {
        case 'homepage':
          $html = '<div class="events">';

          $count = 1;
          foreach( $posts as $post ) {
            setup_postdata( $post );
            $img = get_the_post_thumbnail_url( $post, 'large' );

            if ( empty( $img ) ) {
              $img = get_template_directory_uri() . '/assets/images/event-placeholder-' . $count . '.jpg';
            }

            $html .= '
              <article class="event">
                <a href="' . get_the_permalink() . '">
                  <figure style="background-image: url(' . $img . ')"></figure>
                  <title>' . wp_trim_words( get_the_title(), 3, '...' ) . '</title>
                  <span class="date">' . date( 'M j, Y', strtotime( get_post_meta( $post->ID, 'event_info_event-date', true ) ) ) . '</span>
                  <p class="excerpt">' . wp_trim_words( get_the_content(), 25, '...' ) . '</p>
                  <p class="article-link">Read More ></p>
                </a>
              </article>
            ';

            $count++;
            wp_reset_postdata();
          }

          $html .= '</div>';
          break;
        case 'sidebar':
          $html = '
            <div class="sidebar-events">
              <h3>Upcoming Events</h3>
              <ul>
          ';

          foreach( $posts as $post ) {
            $html .= '
              <li>
                <a href="' . get_the_permalink() . '">' . wp_trim_words( get_the_title(), 5, '...' ) . '</a>
              </li>
            ';
          }

          $html .= '
              </ul>
              <a class="sidebar-all-events-link" href="/parish_events/">More Events ></a>
            </div>
          ';
          break;
      }
    }
    return $html;
  }
}

$dpi_parish_events = new DPI_Parish_Events();
