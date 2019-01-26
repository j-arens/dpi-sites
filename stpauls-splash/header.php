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

        <!-- site branding -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
						<?php

							$img_ID = get_option( 'opt_page_header_logo_image_upload_0' );
							$img_src = wp_get_attachment_image_src( $img_ID, 'full' );

							echo '<img src="' . $img_src[0] . '" alt="site logo" />';
							
					  ?>
				</a>
        <!-- end site branding -->

	</header>
	<!-- End header -->

<!-- Begin site content -->
	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
