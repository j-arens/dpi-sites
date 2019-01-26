<?php

    $contactInfo = [
        'physicalAddressStreet' => carbon_get_theme_option('contact_physical_address_street') ?: '19 N Palafox',
        'physicalAddressCSZ' => carbon_get_theme_option('contact_physical_address_csz') ?: 'St. Pensacola, FL 32502',
        'mailAddressPO' => carbon_get_theme_option('contact_mailing_address_po') ?: 'PO Box 12423',
        'mailAddressCSZ' => carbon_get_theme_option('contact_mailing_address_csz') ?: 'Pensacola, FL 32591',
        'phone' => carbon_get_theme_option('contact_phone_number') ?: '(850) 438-4985',
        'fax' => carbon_get_theme_option('contact_fax_number') ?: '(850) 433-9758'
    ];

    function getFooterBg() {
        $img = wp_get_attachment_image_src(carbon_get_theme_option('footer_bg_img'), 'full');

        if (empty($img)) {
            return get_template_directory_uri() . '/assets/images/footer-bg-dk.jpg';
        }

        return $img[0];
    }

?>

<footer class="site-footer" style="background-image: url(<?= getFooterBg() ?>)">
    <div class="site-footer__container mw-container">
        <div class="site-footer__widgets">
            <div class="site-footer__widget">
                <a href="<?= carbon_get_theme_option('footer_safe_env_link') ?>" class="site-footer__widget-title" target="_blank" rel="noopener">
                    <?= get_template_part('svg/shield') ?>
                    Safe Environment
                </a>
                <p class="site-footer__widget-content">
                    <a href="<?= carbon_get_theme_option('footer_safe_env_link') ?>" target="_blank" rel="noopener" class="site-footer__safe-env-link">
                        <?= carbon_get_theme_option('footer_safe_env') ?>
                    </a>
                </p>
            </div>
            <div class="site-footer__widget">
                <a href="<?= esc_url(home_url('/')) ?>" class="site-footer__logo" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/footer-logo-01.png' ?>)"></a>
                <ul class="site-footer__social-links">
                    <li class="site-footer__social-link-item">
                        <a href="<?= carbon_get_theme_option('facebook_link') ?>" class="site-footer__social-link" target="_blank" rel="noopener">
                            <?= get_template_part('svg/facebook') ?>
                        </a>
                    </li>
                    <li class="site-footer__social-link-item">
                        <a href="<?= carbon_get_theme_option('twitter_link') ?>" class="site-footer__social-link" target="_blank" rel="noopener">
                            <?= get_template_part('svg/twitter') ?>
                        </a>
                    </li>
                    <li class="site-footer__social-link-item">
                        <a href="<?= carbon_get_theme_option('mpa_link') ?>" class="site-footer__social-link" target="_blank" rel="noopener">
                            <?= get_template_part('svg/mpa') ?>
                        </a>
                    </li>
                </ul>
                <div class="site-footer__contact-container">
                    <p class="site-footer__contact-item">
                        <span class="site-footer__contact-icon">
                            <?= get_template_part('svg/location') ?>
                        </span>
                        <?= $contactInfo['physicalAddressStreet'] ?>
                        <br>
                        <?= $contactInfo['physicalAddressCSZ'] ?>
                    </p>
                    <p class="site-footer__contact-item">
                        <span class="site-footer__contact-icon">
                            <?= get_template_part('svg/mail') ?>
                        </span>
                        <?= $contactInfo['mailAddressPO'] ?>
                        <br>
                        <?= $contactInfo['mailAddressCSZ'] ?>
                    </p>
                </div>
                <div class="site-footer__contact-container">
                    <p class="site-footer__contact-item">
                        <span class="site-footer__contact-icon">
                            <?= get_template_part('svg/phone') ?>
                        </span>
                        <?= $contactInfo['phone'] ?>
                    </p>
                    <p class="site-footer__contact-item">
                        <span class="site-footer__contact-icon">
                            <?= get_template_part('svg/fax') ?>
                        </span>
                        <?= $contactInfo['fax'] ?>
                    </p>
                </div>
            </div>
            <div class="site-footer__widget">
                <a href="https://ptdiocese.org/" class="site-footer__widget-title" target="_blank" rel="noopener">
                    <?= get_template_part('svg/church') ?>
                    Diocese of Pensacola
                </a>
                <p class="site-footer__widget-content">
                    <?= carbon_get_theme_option('footer_diocese_info') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="site-footer__quick-links-container">
        <ul class="site-footer__quick-links mw-container">
            <?php foreach(carbon_get_theme_option('footer_quick_links', 'complex') as $link) { ?>
                <li class="site-footer__quick-link-item">
                    <a href="<?= esc_url($link['link']) ?>" class="site-footer__quick-link">
                        <?= wp_trim_words($link['link_title'], '3', '...') ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="site-info">
        <div class="site-info__container mw-container">
            <p class="site-info__copyright">&copy; <?= date('Y') ?> Basilica of St. Michael the Archangel | Pensacola, FL</p>
            <p class="site-info__diocesan">Made with &hearts; by <a href="//diocesan.com" class="site-info__diocesan-link">Diocesan</a></p>
        </div>
    </div>
</footer>