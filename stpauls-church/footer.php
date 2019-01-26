<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dpi-theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<ul>

			<!-- our app -->
			<?php
				$img_id = get_option( 'opt_page_footer_widget_area_1_image_39' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				$html = '
					<li class="our-app">
						<a href="' . get_option( 'opt_page_footer_widget_area_1_text_40' ) . '"><h1>' . get_option( 'opt_page_footer_widget_area_1_text_38' ) . '</h1></a>
						<a href="' . get_option( 'opt_page_footer_widget_area_1_text_40' ) . '" target="_blank"><img src="' . $img_src[0] . '" /></a>
					</li>
				';

				echo $html;

		  ?>
			<!-- end our app -->

			<!-- our diocese -->
			<?php
				$img_id = get_option( 'opt_page_footer_widget_area_2_image_42' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				$html = '
					<li class="Our Diocese">
						<a href="' . get_option( 'opt_page_footer_widget_area_2_text_43' ) . '" target="_blank"><h1>' . get_option( 'opt_page_footer_widget_area_2_text_41' ) . '</h1></a>
						<a href="' . get_option( 'opt_page_footer_widget_area_2_text_43' ) . '" target="_blank"><img src="' . $img_src[0] . '" /></a>
					</li>
				';

				echo $html;

		 	?>
			<!-- end our diocese -->

			<!-- our school -->
			<?php
				$img_id = get_option( 'opt_page_footer_widget_area_3_image_45' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				$html = '
					<li class="our-school">
						<a href="' . get_option( 'opt_page_footer_widget_area_3_text_46' ) . '" target="_blank"><h1>' . get_option( 'opt_page_footer_widget_area_3_text_44' ) . '</h1></a>
						<a href="' . get_option( 'opt_page_footer_widget_area_3_text_46' ) . '" target="_blank"><img src="' . $img_src[0] . '" /></a>
					</li>
				';

				echo $html;
		  ?>
			<!-- end our school -->

			<!-- contact -->
			<?php

			$html = '
				<li class="contact">
					<a href="mailto:' . get_option( 'opt_page_footer_widget_area_4_text_51' ) . '"><h1>' . get_option( 'opt_page_footer_widget_area_4_text_47' ) . '</h1></a>
					<p>' . get_option( 'opt_page_footer_widget_area_4_text_48' ) . '</p>
					<p>' . get_option( 'opt_page_footer_widget_area_4_text_49' ) . '</p>
					<a href="tel:' . get_option( 'opt_page_footer_widget_area_4_text_50' ) . '">P: ' . get_option( 'opt_page_footer_widget_area_4_text_50' ) . ' </a>
					<a href="mailto:' . get_option( 'opt_page_footer_widget_area_4_text_51' ) . '">E: ' . get_option( 'opt_page_footer_widget_area_4_text_51' ) . ' </a>
				</li>
			';

			echo $html;

			?>
			<!-- end contact -->

		</ul>
		<div class="site-info">
			<p>&copy; Copyright <?php echo date('Y'); ?> St. Paul's Catholic Church</p>
			<p>Made with &hearts; by <a href="http://www.diocesan.com/" target="_blank">Diocesan Publications</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
