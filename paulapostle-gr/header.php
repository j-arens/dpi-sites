<?php
/**
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Full page wrapper -->
<div id="page" class="site">
	<!-- Header -->
	<header id="masthead" class="site-header" role="banner">
		<a class="btn" id="give-btn" href="https://www.myeoffering.com/eonline/index.php/dashboard/login/4504" target="_blank">Online Giving</a>
		<div class="featured-links">
			<ul>
				<li><a class="btn" href="#">Calendar</a></li>
				<li><a class="btn" href="/about/bulletins/">Bulletins</a></li>
				<li><a class="btn" href="/about/become-a-member/">Become A Member</a></li>
			</ul>
			<p><img src="/wp-content/themes/dpi-theme-v4/icons/compass.svg" alt="" /><a target="_blank" href="https://www.google.com/maps/place/St+Paul+the+Apostle+Catholic/@42.925706,-85.6028987,17z/data=!4m13!1m7!3m6!1s0x88184d529c10c2e1:0xc9bdbf3bb38809bd!2s2750+Burton+St+SE,+Grand+Rapids,+MI+49546!3b1!8m2!3d42.925706!4d-85.60071!3m4!1s0x88184d529c10c2e1:0xbba8f5c014ebac71!8m2!3d42.9258272!4d-85.6005163">2750 Burton Street Grand Rapids, MI</a></p>
			<a class="phone" href="tel:6169494170"><img src="/wp-content/themes/dpi-theme-v4/icons/smartphone.svg" alt="" />(616) 949-4170</a><a class="email" href="mailto:contact@stpaul.com"><img src="/wp-content/themes/dpi-theme-v4/icons/email.svg" alt="" />contact@stpaul.com</a>
		</div>

			<!-- site branding -->
			<?php

				$img_id = get_option( 'opt_page_header_logo_image_0' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				$html = '
				<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="site-logo">
						<img src="' . $img_src[0] . '" alt="site logo" />
				</a>
				';

				echo $html;
			?>
		<!-- end site branding -->

	       <!-- site navigation -->
				 <nav id="site-navigation" data-breakpoint="1050">
					 <!-- mobile nav toggle -->
					 <div class="menu-toggle">
						 <p>Menu</p>
						 <span class="toggle-btn"></span>
					 </div>
					 <!-- end mobile nav toggle -->
					 <!-- wp menu -->
					 <div class="menu bg-primary">
							 <?php

									 if ( has_nav_menu( 'primary' ) ) {
											 wp_nav_menu( array(
													 'theme_location' => 'primary',
													 'menu_class' => '',
													 'container' => '',
													 'depth' => 3,
											 ) );
									 }

									 get_search_form();
							 ?>
					 </div>
				 <!-- End wp menu -->
			 </nav>
	    <!-- End nav -->
	</header>
	<!-- End header -->

<!-- Begin site content -->
	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
