<nav class="site-nav">
    <?php 
        if (has_nav_menu('primary_navigation')) {
            wp_nav_menu([
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'theme_location' => 'primary_navigation',
                'menu_class' => 'site-nav__menu',
                'menu_id' => 'js-site-nav',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 4,
                'walker' => new Spine\scripts\php\NavWalker()
            ]);
        }
    ?>
</nav>