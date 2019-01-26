<!--  gallery  -->
<div class="site-footer__gallery">
    <p class="site-footer__title site-footer__title-center">Photo Gallery</p>
    <div class="site-footer__gallery-wrap">
        <?= do_shortcode(carbon_get_theme_option('gallery_shortcode')) ?>
    </div>
    <a href="<?= carbon_get_theme_option('gallery_link_url') ?>" class="site-footer__links-btn site-footer__links-btn-center">
        <?= carbon_get_theme_option('gallery_link_text') ?>
    </a>
</div>
<!--  /gallery  -->