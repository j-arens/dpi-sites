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
<link rel="icon" type="image/png" sizes="32x32" href="wp-content/themes/dpi-theme-v4/images/favicon-32x32.png">
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
						<img src="<?php echo get_template_directory_uri(); ?>/images/Lawrence_Logo_white.png" alt="site logo" />
				</a>
        <!-- end site branding -->

       <!-- site navigation -->
        <nav id="site-navigation">
            <!-- mobile nav toggle -->
            <div class="menu-toggle">
                <span class="toggle-btn"></span>
            </div>
            <!-- end mobile nav toggle -->
            <!-- wp menu -->
            <div class="menu">
                <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class' => '',
                            'container' => ''
                        ) );
                    }
                ?>
            </div>
            <!-- End wp menu -->
        </nav>
        <!-- End nav -->
	</header>
	<!-- End header -->

<!-- Begin site content -->
	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
