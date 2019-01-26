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
			<ul>
				<li>
					<strong>Office Hours</strong>
					<hr>
					<p>
						Monday, Wednesday, Friday - 9:00 am to 2:00 pm
					</p>
					<p>
						Tuesday and Thursday - 1:00 pm to 5:00 pm
					</p>
				</li>
				<li>
					<strong>Links</strong>
					<hr>
					<a target="_blank" href="http://www.archindy.org/index.html">Archdiocese of Indianapolis</a>
					<a target="_blank" href="https://www.facebook.com/St-Teresa-Benedicta-of-the-Cross-Bright-206907186017885/">Parish Facebook</a>
					<a target="_blank" href="https://discovermass.com/church/st-teresa-benedicta-of-the-cross-lawrenceburg-in/#bulletins">Bulletins</a>
					<a target="_blank" href="https://stteresab.weshareonline.org/">Online Giving</a>
				</li>
				<li>
					<strong>Contact</strong>
					<hr>
					<a href="tel:8126568700">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/></svg>(812) 656-8700</a>
<a href="mailto:parishoffice@stteresab.org">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>parishoffice@stteresab.org</a>
<a href="https://www.google.com/maps?ll=39.211169,-84.860788&z=16&t=m&hl=en-GB&gl=US&mapclient=embed&daddr=St+Teresa+Benedicta-The+Cross+23345+Gavin+Ln+Lawrenceburg+Township,+IN+47025@39.2111693,-84.86078839999999">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>Directions</a>
				</li>
			</ul>
		</div>

		<!-- site info -->
		<div class="site-info">
			<p>&copy; Copyright <?php echo get_option( 'opt_page_footer_site_info_text_1', '-- change me in the customizer --' ); ?> <?php echo date('Y'); ?></p>
			<p>Made with &hearts; by <a href="http://www.diocesan.com">Diocesan Publications</a></p>
		</div>
		<!-- end site info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
