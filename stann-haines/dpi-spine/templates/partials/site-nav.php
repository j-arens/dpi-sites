<?php require_once get_template_directory() . '/scripts/php/nav-walker.php';?>
<nav class="site-nav">
    <button id="nav-toggle" class="mobile-nav-toggle">
        <?php 
            get_template_part('svg/hamburger');
            get_template_part('svg/close'); 
        ?>
    </button>
    <div class="menu-wrap">
        <?php 
            wp_nav_menu([
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav-menu',
                'items_wrap' => '<ul id="primary-menu" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new NavWalker()
            ]);
        ?>
    </div>
</nav>