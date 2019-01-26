<footer class="site-footer">
    <div class="site-footer__container mw-container">
        <div class="site-footer__widget">
            <a href="<?= esc_url(home_url('/')) ?>" class="site-footer__logo-link" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/st-tims-logo-01.png' ?>)"></a>
        </div>
        <div class="site-footer__widget">
            <p class="site-footer__widget-title">Contact</p>
            <ul class="site-footer__contact">
                <li class="site-footer__address"><?= carbon_get_theme_option('street') ?></li>
                <li class="site-footer__csz"><?= carbon_get_theme_option('city') ?> <?= carbon_get_theme_option('state') ?>, <?= carbon_get_theme_option('zip_code') ?></li>
                <li class="site-footer__phone">
                    <?= get_template_part('svg/phone') ?>
                    <?= carbon_get_theme_option('phone_number') ?>
                </li>
                <li class="site-footer__fax">
                    <?= get_template_part('svg/fax') ?>
                    <?= carbon_get_theme_option('fax_number') ?>
                </li>
            </ul>
        </div>
        <div class="site-footer__widget">
            <p class="site-footer__widget-title">Newsletter</p>
            <div class="site-footer__newsletter-form">
                <?= do_shortcode('[ninja_form id=5]') ?>
            </div>
            <p class="site-footer__widget-title">Follow Us</p>
            <div class="site-footer__social-links">
                <a href="<?= carbon_get_theme_option('facebook_url') ?>" target="_blank" rel="noopener" class="site-footer__social-link">
                    <?= get_template_part('svg/facebook-circ') ?>
                </a>
                <a href="<?= carbon_get_theme_option('twitter_url') ?>" target="_blank" rel="noopener" class="site-footer__social-link">
                    <?= get_template_part('svg/twitter-circ') ?>
                </a>
            </div>
        </div>
        <div class="site-footer__widget">
            <p class="site-footer__widget-title">Our Mission</p>
            <p class="site-footer__mission">
                "We the people of St. Timothy Parish, seek to become a bright beacon of faith in Christ by fostering a family community in a loving and spiritual environment in which we may grow in service and knowledge of God."
            </p>
        </div>
        <button class="js-skip-to site-footer__slide-toggle btn__round-toggle js-slide-toggle" data-anchor="skipTo-header">
            <?= get_template_part('svg/toggle', 'chevronup') ?>
            Return
        </button>
    </div>
    <div class="site-info">
        <p class="site-info__sig">&copy; <?= date('Y') ?> <?= carbon_get_theme_option('church_name') ?> | <?= carbon_get_theme_option('city') ?>, <?= carbon_get_theme_option('state') ?> / Made with &hearts; by <a href="//diocesan.com" target="_blank" rel="noopener">Diocesan</a></p>
    </div>
</footer>
