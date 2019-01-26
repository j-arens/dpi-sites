<nav class="site-nav">
    <?php 
        wp_nav_menu([
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'theme_location' => 'primary_navigation',
            'menu_class' => 'site-nav__menu',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new Spine\Scripts\php\NavWalker()
        ]);
    ?>
</nav>