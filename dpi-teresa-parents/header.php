<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dpi-teresa
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dpi-teresa' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

        <!-- site branding -->
       <div class="branding-container">
           <a href="http://mtctampa.diocesanweb.com/wp/parents/" class="site-logo">
               <img src="" alt="">
           </a>
            <div class="site-name">
                <h1>Mother Teresa</h1>
                <h2>of Calcutta Catholic School</h2>
            </div>
        </div>
        <!-- end site branding -->

        <!-- quick links -->
        <nav class="quick-links">
            <ul>
               <li><a href="http://mtctampa.diocesanweb.com/wp/parents/student-life/teacher-websites/">Teacher Websites</a></li>
               <li><span class="divider"></span></li>
               <li><a href="https://www.plusportals.com/Motherteresacatholicschool" target="_blank">Rediker</a></li>
               <li><span class="divider"></span></li>
                <li><a href="http://mtctampa.diocesanweb.com/wp">School</a></li>
                <li><span class="divider"></span></li>
                <li><?php get_search_form(); ?></li>
            </ul>
        </nav>
        <!-- end quick links -->

       <!-- site navigation -->
        <nav id="site-navigation">
            <!-- mobile nav toggle -->
            <div class="menu-toggle">
                <button class="toggle-btn"></button>
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
            <!-- end wp menu -->
        </nav>
        <!-- end site navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
