<?php
/*
Template Name: Staff Page Template
*/

get_header(); ?>

<!-- if contact page -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">
                        <div id="staff_page">
                        
                            <?php the_content(); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

                            <?php dynamic_sidebar( 'staff_page' ); ?>
                        </div>
					</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
 ?>