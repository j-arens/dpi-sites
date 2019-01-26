<div class="footer-bulletin">
    <p class="site-footer__widget-title">Current Bulletin</p>
    <?= do_shortcode(carbon_get_theme_option('footer_bulletins_shortcode')) ?>
    <a href="<?= get_page_link(carbon_get_theme_option('footer_bulletins_page_link')[0]) ?>" class="footer-bulletin__bulletins-link">View More ></a>
</div>