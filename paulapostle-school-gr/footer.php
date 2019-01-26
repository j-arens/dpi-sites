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
			<?php

				$html = '<ul>';

				// about
				$html .= '
					<li>
						<h3><strong>' . get_option( 'opt_page_footer_about_text_19' ) . '</strong></h3>
						<hr>
						<p>' . get_option( 'opt_page_footer_about_textarea_20' ) . '</p>
					</li>
				';

				// links
				$html .= '
					<li>
						<h3><strong>' . get_option( 'opt_page_footer_links_text_39' ) . '</strong></h3>
						<hr>
						<a href="' . get_option( 'opt_page_footer_links_text_22' ) . '">' . get_option( 'opt_page_footer_links_text_21' ) . '</a>
						<a href="' . get_option( 'opt_page_footer_links_text_24' ) . '">' . get_option( 'opt_page_footer_links_text_23' ) . '</a>
						<a href="' . get_option( 'opt_page_footer_links_text_26' ) . '">' . get_option( 'opt_page_footer_links_text_25' ) . '</a>
						<a href="' . get_option( 'opt_page_footer_links_text_28' ) . '">' . get_option( 'opt_page_footer_links_text_27' ) . '</a>
						<a href="' . get_option( 'opt_page_footer_links_text_30' ) . '">' . get_option( 'opt_page_footer_links_text_29' ) . '</a>
					</li>
				';

				// contact
				$img_id = get_option( 'opt_page_footer_contact_image_36' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				$html .= '
					<li class="footer-contact">
						<h3><strong>' . get_option( 'opt_page_footer_contact_text_31' ) . '</strong></h3>
						<hr>
						<p class="street">' . get_option( 'opt_page_footer_contact_text_32' ) . '</p>
						<p class="geo">' . get_option( 'opt_page_footer_contact_text_33' ) . '</p>
						<a href="tel:' . get_option( 'opt_page_footer_contact_text_34' ) . '"><img class="social-icon" src="/wp-content/themes/paul-school/icons/smartphone.svg" alt="Phone" /><strong>' . get_option( 'opt_page_footer_contact_text_34' ) . '</strong></a>
						<a href="mailto:' . get_option( 'opt_page_footer_contact_text_35' ) . '"><img class="social-icon" src="/wp-content/themes/paul-school/icons/email.svg" alt="email" /><strong>' . get_option( 'opt_page_footer_contact_text_35' ) . '</strong></a>
						<a href="' . get_option( 'opt_page_footer_contact_text_38' ) . '"><img class="social-icon" src="' . $img_src[0] . '" alt="Social Link" />' . get_option( 'opt_page_footer_contact_text_37' ) . '</a>
					</li>
				';

				$html .= '</ul>';

			 echo $html;
		  ?>
		</div>
		<!-- end container -->

		<!-- site info -->
		<div class="site-info">
			<p>&copy; Copyright St. Paul The Apostle Church <?php echo date('Y'); ?></p>
			<p>Made with &hearts; by <a href="http://www.diocesan.com">Diocesan Publications</a></p>
		</div>
		<!-- end site info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
