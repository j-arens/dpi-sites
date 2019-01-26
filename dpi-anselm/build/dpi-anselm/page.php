<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
    <!-- Page title header -->
    <header class="page-<?php echo strtolower( get_the_title( $post ) ); ?>">
       <div class="title-wrap">
        <h2> <?php echo get_the_title( $post ); ?> </h2>
       </div>
    </header>
    <!-- End page title header  -->
    <div id="content" class="page-<?php echo strtolower( get_the_title( $post ) ); ?>">
        <div id="primary" class="content-area">
            <main>
                <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
            </main>
            <!-- End main -->
            <?php get_sidebar( 'content-bottom' ); ?>
        </div>
        <!-- End content-area -->
    </div>
    <?php get_footer(); ?>