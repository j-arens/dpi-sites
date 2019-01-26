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

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
    
    <script type="text/javascript">
        jQuery(window).load(function(){
            jQuery(document).ready(function() {
              jQuery('#menu-toggle').click(function() {
                jQuery(this).parent().find('.menu-primary-container').slideToggle();
              });
            });
        });
        
        jQuery(window).load(function(){
            jQuery(document).ready(function() {
              jQuery('.dropdown-toggle').click(function() {
                jQuery(this).parent().find('.sub-menu').slideToggle();
              });
            });
        });
    </script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">

		<header id="masthead" class="site-header" role="banner">
			<div class="header-wrap">
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="/wp-content/themes/diocesan-theme/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
                    </a>
				</div><!-- .site-branding -->
    
                <div class="header-social">
                    <a href="#"><img src="/wp-content/themes/diocesan-theme/images/facebook.png" alt="" /></a>
                    <a href="#"><img src="/wp-content/themes/diocesan-theme/images/twitter.png" alt="" /></a>
                </div>
                
            </div>            
            
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                <div class="nav-wrap">
                    <div><!-- for mobile flexing -->
                    <button id="menu-toggle" class="menu-toggle"><?php _e( '', 'twentysixteen' ); ?>
                        <div class="hamburger">
                            <div class="top-line"></div>
                            <div class="middle-line"></div>
                            <div class="bottom-line"></div>
                        </div>
                    </button>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>

                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'primary-menu',
                            ) );
                        ?>

                    <?php endif; ?>
                    </div>
                    <?php get_search_form(); ?>
                    
                </div>
                
            </nav><!-- .main-navigation -->
                
		</header><!-- .site-header -->
