<?php
/**
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
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
			 <nav id="site-navigation" data-breakpoint="1150">
				 <!-- mobile nav toggle -->
				 <div class="menu-toggle">
					 <p>Menu</p>
					 <span class="toggle-btn"></span>
				 </div>
				 <!-- end mobile nav toggle -->
				 <!-- wp menu -->
				 <div class="menu bg-primary">
					 <ul id="menu-primary">
					 	<li><a href="#about">About</a></li>
						<li><a href="#mass-times">Mass Times</a></li>
						<li><a href="#bulletins">Bulletins</a></li>
						<li><a href="#contact">Contact</a></li>
					 </ul>
				 </div>
			 <!-- End wp menu -->
		 </nav>
    <!-- End nav -->
	</header>
	<!-- End header -->

<!-- Begin site content -->
	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
