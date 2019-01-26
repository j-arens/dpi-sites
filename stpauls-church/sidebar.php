<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *
 *<!-- news posts -->
 *<div class="sidebar-news widget">
 *   <h2>Get Involved</h2>
 *   <?php echo do_shortcode( '[event-posts layout="sidebar_template"]' ); ?>
 * </div>
 * <!-- end news posts -->
 *
 * <!-- sidebar nav -->
 * <div class="sidebar-nav widget">
 *   <h2>Userful Links</h2>
 *   <?php echo do_shortcode( '[sidebar_nav]' ); ?>
 * </div>
 * <!-- end sidebar nav -->
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="sidebar" role="complementary">

  <?php dynamic_sidebar( 'sidebar-1' ); ?>

</aside><!-- #secondary -->
