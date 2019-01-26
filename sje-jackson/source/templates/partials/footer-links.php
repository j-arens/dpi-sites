<div class="footer-links">
    <p class="site-footer__widget-title">Quick Links</p>
    <ul class="footer-links__list">
        <?php foreach(carbon_get_theme_option('footer_quick_links', 'complex') as $link) { ?>
            <li class="footer-links__item">
                <a href="<?= get_page_link($link['page'][0]) ?>" class="footer-links__link"><?= $link['link_title'] ?></a>
            </li>
        <?php } ?>
    </ul>
    <p class="site-footer__widget-title site-footer__widget-title--no-border">Location</p>
    <p class="footer-links__address"><?= carbon_get_theme_option('footer_location_street') ?></p>
    <p class="footer-links__address"><?= carbon_get_theme_option('footer_location_csz') ?></p>
    <p class="footer-links__address"><?= carbon_get_theme_option('footer_location_phone') ?></p>
</div>