<nav class="site-nav">
    <?php 

        // mobile nav
        echo do_shortcode('[dpi_mm menu="primary_navigation"]');

        // desktop nav
        if (has_nav_menu('primary_navigation')) {
            wp_nav_menu([
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'theme_location' => 'primary_navigation',
                'menu_class' => 'site-nav__menu',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 3,
                'walker' => new Spine\scripts\php\NavWalker()
            ]);
        }
    ?>
</nav>