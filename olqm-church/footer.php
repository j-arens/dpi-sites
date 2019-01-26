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
		<div class="container">

			<!-- footer section -->
			<div class="footer-section">
				<?php

					$html = '
						<h3 class="rule">' . get_option( 'opt_page_footer_about_text_63' ) . '</h3>
						<p>' . get_option( 'opt_page_footer_about_textarea_64' ) . '</p>
					';

					echo $html;

			  ?>
			</div>
			<!-- end footer section -->

			<!-- footer section -->
			<div class="footer-section">
				<?php

					$phone_img_id = get_option( 'opt_page_footer_contact_image_68' );
					$phone_img_url = wp_get_attachment_thumb_url( $phone_img_id, 'full' );

					$social_img_1_id = get_option( 'opt_page_footer_contact_image_70' );
					$social_img_1_url = wp_get_attachment_thumb_url( $social_img_1_id, 'full' );

					$social_img_2_id = get_option( 'opt_page_footer_contact_image_73' );
					$social_img_2_url = wp_get_attachment_thumb_url( $social_img_2_id, 'full' );

					$social_img_3_id = get_option( 'opt_page_footer_contact_image_76' );
					$social_img_3_url = wp_get_attachment_thumb_url( $social_img_3_id, 'full' );

					$html = '
						<h3 class="rule">' . get_option( 'opt_page_footer_contact_info_text_64' ) . '</h3>
						<ul class="contact-info">
							<li>' . get_option( 'opt_page_footer_contact_info_textarea_65' ) . '</li>
							<li>' . get_option( 'opt_page_footer_contact_info_textarea_66' ) . '</li>
							<li class="icon"><img class="footer-icon" src="' . $phone_img_url . '"/><a href="' . get_option( 'opt_page_footer_contact_text_69' ) . '">' . get_option( 'opt_page_footer_contact_text_69' ) . '</a></li>
							<li class="icon"><img class="footer-icon" src="' . $social_img_1_url . '"/><a href="' . get_option( 'opt_page_footer_contact_text_72' ) . '">' . get_option( 'opt_page_footer_contact_text_71' ) . '</a></li>
							<li class="icon"><img class="footer-icon" src="' . $social_img_2_url . '"/><a href="' . get_option( 'opt_page_footer_contact_text_75' ) . '">' . get_option( 'opt_page_footer_contact_text_74' ) . '</a></li>
							<li class="icon"><img class="footer-icon" src="' . $social_img_3_url . '"/><a href="' . get_option( 'opt_page_footer_contact_text_78' ) . '">' . get_option( 'opt_page_footer_contact_text_77' ) . '</a></li>
						</ul>
					';

					echo $html;

			  ?>
			</div>
			<!-- end footer section -->

			<!-- footer section -->
			<div class="footer-section">
				<h3 class="rule">We Are On Twitter</h3>
				<p>
					Coming soon... stay tuned
				</p>
			</div>
			<!-- end footer section -->

		</div>
		<!-- end container -->

		<!-- site info -->
		<div class="site-info">
			<p>&copy; Copyright Our Lady Queen of Martyrs <?php echo date('Y'); ?></p>
			<p>Made with &hearts; by <a href="#">Diocesan Publications</a></p>
		</div>
		<!-- end site info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
