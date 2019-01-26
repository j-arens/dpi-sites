<?php
/**
 * The template for displaying an archive page of all posts in the events category
 *
 */

 /*
 Template Name: -- name -- archive
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <?php

      $the_query = new WP_Query( array( 'post_type' => 'events_posts', 'posts_per_page' => 8 ) );

      if ($the_query->have_posts()) {
        while($the_query->have_posts()) {
          $the_query->the_post();
            get_template_part( 'template-parts/content', get_post_format() );
        }
      } else {
        get_template_part( 'template-parts/content', 'none' );
      }

		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php

get_sidebar();
get_footer(); ?>
