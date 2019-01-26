<?php

/**
* CPT
*/
function dpi_testimonials() {
  $labels = [
    'name' => _x('Testimonial', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New Testimonial', 'Link Box'),
    'add_new_item' => __('Add New Testimonial'),
    'edit-item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'all_items' => __('All Testimonials'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonials'),
    'not_found' => __('No Testimonials Found'),
    'not_found_in_trash' => __('No Testimonials found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
  ];

  $args = [
    'labels' => $labels,
    'description' => 'Testimonials',
    'public' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array('slug'=>'dpi_testimonials'),
    'menu-position' => 2,
    'supports' => array('title', 'editor'),
    'has_archive' => true,
    'show_in_rest' => true,
    'rest_base' => 'dpi_testimonials'
  ];

  register_post_type( 'dpi_testimonials', $args );
}

add_action( 'init', 'dpi_testimonials' );

/**
* Testimonial author meta box
*/

class DPI_Testimonials_Meta_Box {
	private $screens = array(
		'dpi_testimonials',
	);
	private $fields = array(
		array(
			'id' => 'author-name',
			'label' => 'Author Name',
			'type' => 'text',
		),
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'Testimonial Meta Info',
				__( 'Testimonial Meta Info', 'rational-metabox' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'core'
			);
		}
	}

	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'advanced_options_data', 'advanced_options_nonce' );
		echo 'Testimonial Attribution';
		$this->generate_fields( $post );
	}

	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'advanced_options_' . $field['id'], true );
			switch ( $field['type'] ) {
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}

	public function save_post( $post_id ) {
		if ( ! isset( $_POST['advanced_options_nonce'] ) )
			return $post_id;

		$nonce = $_POST['advanced_options_nonce'];
		if ( !wp_verify_nonce( $nonce, 'advanced_options_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'advanced_options_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'advanced_options_' . $field['id'], '0' );
			}
		}
	}
}

new DPI_Testimonials_Meta_Box;

/**
* Shortcode
*/

function dpi_testimonials_shortcode_handler( $atts ) {
  global $post;
  $template = '';

  $args = shortcode_atts([
    'quantity' => 1
  ], $atts );

  $posts = get_posts([
    'post_type' => 'dpi_testimonials'
  ]);

  if ( !empty( $posts ) ) {
    $i = 0;
    while( $i < $args['quantity'] ) {
      $j = array_rand( $posts, 1 );
      $more_tag = '<a href="' . get_post_permalink( $posts[$j]->ID ) . '">... Read More</a>';
      $template .= '
        <div class="testimonial">
          <blockquote class="excerpt">
            <p>' . wp_trim_words( $posts[$j]->post_content, 44, $more_tag ) . '</p>
            <cite><b>- ' . get_post_meta( $posts[$j]->ID, 'advanced_options_author-name', true ) . '</b></cite>
          </blockquote>
        </div>
      ';
      $i++;
    }
  } else {
    $template = '<div class="no-posts-found">Sorry, there aren\'t any articles to show you at the moment.</div>';
  }

  return $template;
}

add_shortcode( 'dpi_testimonials', 'dpi_testimonials_shortcode_handler' );
