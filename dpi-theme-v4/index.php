<?php
/**
 * The main template file
*/

get_header(); ?>
<!-- slider -->
<?php
	if (shortcode_exists( 'rev_slider' ) ) {
		$shortcode = get_option( 'opt_page_homepage_slider_textarea_1', '[rev_slider alias="home_slider"]' );
		echo do_shortcode( $shortcode );
	}
?>
<!-- end slider -->

<?php get_footer(); ?>