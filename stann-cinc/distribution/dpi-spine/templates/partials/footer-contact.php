<!--  contact  -->
<div class="site-footer__contact">
    <p class="site-footer__title site-footer__title-center">Contact</p>
    <div class="site-footer__contact-wrap">
        <div class="site-footer__location">
            <p class="site-footer__church-name"><?= carbon_get_theme_option('church_name') ?></p>
            <p class="site-footer__address">
                <?= carbon_get_theme_option('street') ?>
                <br>
                <?= carbon_get_theme_option('city') ?>, <?= carbon_get_theme_option('state') ?> <?= carbon_get_theme_option('zip_code') ?>
            </p>
        </div>
        <ul class="site-footer__contact-info">
            <li class="site-footer__contact-item">
                <?= get_template_part('svg/phone-circ-white') ?>
                <?= carbon_get_theme_option('phone_number') ?>
            </li>
            <li class="site-footer__contact-item">
                <?= get_template_part('svg/fax-circ-white') ?>
                <?= carbon_get_theme_option('fax_number') ?>
            </li>
            <li class="site-footer__contact-item">
                <?= get_template_part('svg/email-circ-white') ?>
                <?= carbon_get_theme_option('email') ?>
            </li>
        </ul>
    </div>
</div>
<!--  /contact  -->