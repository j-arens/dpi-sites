<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */



?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?> class="no-js">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
            <?php endif; ?>
                <?php wp_head(); ?>
                   <script src='https://www.google.com/recaptcha/api.js'></script>
                    <script type="text/javascript">
                        //mobile menu
                        (function () {
                            var $ = jQuery;
                            var dropDowns;
                            $(document).ready(function () {
                                var nestedMenu = jQuery('.menu-item-has-children');
                                //animate the hamburger icon
                                $('.menu-toggle').click(function () {
                                    $(this).find(':first-child').toggleClass('top-line-exit');
                                    $(this).find(':nth-child(2)').toggleClass('middle-line-exit');
                                    $(this).find(':last-child').toggleClass('bottom-line-exit');
                                    $('.menu').slideToggle();
                                });
                                //append dropdown button to li's with nested ul's
                                nestedMenu.each(function () {
                                    var btn = document.createElement('BUTTON');
                                    btn.className = 'dropdown-toggle';
                                    $(this).append(btn);
                                });
                                dropDowns = $('.dropdown-toggle');
                                //display nested menus on button click
                                dropDowns.click(function (e) {
                                    e.preventDefault();
                                    $(this).parent().find('> .sub-menu').slideToggle();
                                });
                            });
                        }());
                    </script>
    </head>

    <body <?php body_class(); ?>>
       <div class="page-wrap">
        <!-- Site header -->
        <header id="site-header">
            <!-- Social icons -->
            <div class="header-social">
                <a href="#"> <img src="/wp-content/themes/dpi-anselm/images/icons/parish-app-icon.png" alt="My parish app"> </a>
                <a href="https://www.facebook.com/StAnselmCatholicChurch/"> <img src="/wp-content/themes/dpi-anselm/images/icons/facebook-share-icon.png" alt="facebook"> </a>
                <a href="https://twitter.com/anselmcommunity"> <img src="/wp-content/themes/dpi-anselm/images/icons/twitter-share-icon.png" alt="twitter"> </a>
                <?php get_search_form(); ?>
            </div>
            <!-- End social icons -->
            <!-- Site logo -->
            <a href="http://anselm.diocesanweb.com" class="site-logo"> <img src="/wp-content/themes/dpi-anselm/images/logo.png" alt="Site logo"> </a>
            <!-- End logo -->
            <!-- Site nav -->
            <nav id="site-navigation">
                <!-- Mobile nav button -->
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- End mobile nav button -->
                <!-- Site menu -->
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
                <!-- End site menu -->
            </nav>
            <!-- End site nav -->
        </header>
        <!-- End site header -->