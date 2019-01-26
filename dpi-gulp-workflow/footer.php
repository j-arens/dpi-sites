<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-widget-area">
                <div class="footer-widget-area-wrap">
					<div class="footer-widget">
					
						<?php if( have_rows('footer_area_1', 'option') ): ?>
							<?php while( have_rows('footer_area_1', 'option') ): the_row(); ?>
									<h3 class="footer-widget-title"><?php the_sub_field('footer_heading'); ?></h3>
								<p><?php the_sub_field('footer_content'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>
							
					</div>
					<div class="footer-widget">
					
						<?php if( have_rows('footer_area_2', 'option') ): ?>
							<?php while( have_rows('footer_area_2', 'option') ): the_row(); ?>
									<h3 class="footer-widget-title"><?php the_sub_field('footer_heading'); ?></h3>
								<p><?php the_sub_field('footer_content'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>
							
					</div>

					<div class="footer-widget">
					
						<?php if( have_rows('footer_area_3', 'option') ): ?>
							<?php while( have_rows('footer_area_3', 'option') ): the_row(); ?>
									<h3 class="footer-widget-title"><?php the_sub_field('footer_heading'); ?></h3>
								<p><?php the_sub_field('footer_content'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>
							
					</div>					

				   <?php //dynamic_sidebar( 'footer_widgets' ); ?>
                </div>
            </div>
			<div class="site-info">
				<p>&copy; <?php echo date('Y'); ?> <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> &middot; Made with 	&hearts; by <a href="http://diocesan.com">Diocesan Publications</a></p>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
