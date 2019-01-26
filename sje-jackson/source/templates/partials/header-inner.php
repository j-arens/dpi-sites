<div class="header-inner__menu-container mw-container">
    <a 
        href="<?= esc_url(home_url()) ?>" 
        class="header-inner__logo" 
        style="background-image: url(<?= wp_get_attachment_image_src(carbon_get_theme_option('header_logo'), 'full')[0] ?>)">
    </a>
    <?= get_template_part('partials/site-nav') ?>
    <?= get_template_part('partials/mobile-nav') ?>
</div>