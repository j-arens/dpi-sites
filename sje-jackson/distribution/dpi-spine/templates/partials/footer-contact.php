<div class="footer-contact">
    <p class="site-footer__widget-title">Contact Us</p>
    <div class="footer-contact__form-container">
        <?= do_shortcode(carbon_get_theme_option('footer_contact_shortcode')) ?>
    </div>
    <div class="footer-contact__social-links">
        <a href="<?= carbon_get_theme_option('footer_contact_facebook') ?>" class="footer-contact__social-link" target="_blank" rel="noopener">
            <?= get_template_part('svg/facebook') ?>
        </a>
        <a href="//myparishapp.net" class="footer-contact__social-link" target="_blank" rel="noopener">
            <?= get_template_part('svg/mpa') ?>
        </a>
    </div>
</div>