<?php

require_once get_template_directory() . '/scripts/php/primary-nav-walker.php';
require_once get_template_directory() . '/scripts/php/secondary-nav-walker.php';
require_once get_template_directory() . '/scripts/php/mobile-nav-walker.php';

?>

<nav id="site-navigation" class="site-nav col-xs-12">
    <button id="mobile-nav-toggle">
        <span class="hamburger"></span>
    </button>
    <div class="menu-wrap">
        <?php
            if (has_nav_menu('primary_navigation')) {

                // top level menu
                wp_nav_menu([
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'nav-menu',
                    'items_wrap' => '<ul id="menu-primary-menu" class="%2$s">%3$s</ul>',
                    'depth' => 1,
                    'walker' => new DPI_Primary_Walker()
                ]);

                // sub menus
                wp_nav_menu([
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'theme_location' => 'primary_navigation',
                    'menu_class' => '',
                    'items_wrap' => '<div class="sub-menu-wrap">%3$s</div>',
                    'depth' => 3,
                    'walker' => new DPI_Secondary_Walker()
                ]);

                // mobile nav
                wp_nav_menu([
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'mobile-nav-menu',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 3,
                    'walker' => new DPI_Mobile_Walker()
                ]);
            }
        ?>
    </div>
</nav>