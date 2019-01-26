<?php
/*
Template Name: Full Width Page
*/

get_header(); ?>

<!-- if contact page -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
 ?>
