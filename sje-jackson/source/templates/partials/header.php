<header class="site-header <?= is_front_page() ? 'site-header__home' : 'site-header__inner' ?>">
    <?php 
        if (is_front_page()) {
            get_template_part('partials/header-home');
        } else {
            get_template_part('partials/header-inner');
        }
    ?>
</header>
