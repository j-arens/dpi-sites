<div class="site-footer__widget site-footer__col">
    <?php get_template_part('svg/map-marker') ?>
    <p class="site-footer__widget-title">
        <?= carbon_get_theme_option('street') ?>
        <br>
        <?= carbon_get_theme_option('city') ?>, <?= carbon_get_theme_option('state') ?> <?= carbon_get_theme_option('zip_code') ?>
    </p>
</div>