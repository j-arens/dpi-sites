<?php
/**
 * The template for displaying an archive page of all posts in the events category
 *
 */

 /*
 Template Name: Posts Archive
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <?php

      $the_query = new WP_Query( array( 'category_name' => 'parish_news', 'posts_per_page' => 10 ) );

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
get_footer();

?>
