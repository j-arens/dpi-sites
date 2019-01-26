<!--  connect  -->
<div class="site-footer__connect">
    <p class="site-footer__title">Connect</p>
    <ul class="site-footer__connect-links">
        <li class="site-footer__connect-item">
            <a href="<?= carbon_get_theme_option('facebook_link') ?>" target="_blank" rel="noopener" class="site-footer__connect-link">
                <?= get_template_part('svg/facebook-circ') ?>
                Facebook
            </a>
        </li>
        <li class="site-footer__connect-item">
            <a href="<?= carbon_get_theme_option('instagram_link') ?>" target="_blank" rel="noopener" class="site-footer__connect-link">
                <?= get_template_part('svg/instagram-circ') ?>
                Instagram
            </a>
        </li>
        <li class="site-footer__connect-item">
            <a href="<?= carbon_get_theme_option('flocknote_link') ?>" target="_blank" rel="noopener" class="site-footer__connect-link">
                <?= get_template_part('svg/flocknote-circ') ?>
                Flocknote
            </a>
        </li>
        <li class="site-footer__connect-item">
            <a href="<?= carbon_get_theme_option('pinterest_link') ?>" target="_blank" rel="noopener" class="site-footer__connect-link">
                <?= get_template_part('svg/pinterest-circ') ?>
                Pinterest
            </a>
        </li>
    </ul>
</div>
<!--  /connect  -->