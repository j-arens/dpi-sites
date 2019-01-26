<?php
/*
Template Name: Full Width Page
*/

get_header(); ?>
<div id="content" class="site-content">
<div id="primary" class="content-area full-width">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
</div>

<?php get_footer(); ?>
