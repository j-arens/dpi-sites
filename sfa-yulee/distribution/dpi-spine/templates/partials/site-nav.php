<?php require_once get_template_directory() . '/scripts/php/nav-walker.php' ?>

<nav class="site-nav">
    <?= do_shortcode('[responsive_menu]') ?>
    <?php 
        wp_nav_menu([
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'theme_location' => 'primary_navigation',
            'menu_class' => 'site-nav--menu',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 3,
            'walker' => new NavWalker()
        ]);
    ?>
</nav>