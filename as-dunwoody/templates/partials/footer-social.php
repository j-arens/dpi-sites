<?php

    $links = [
        [
            'icon' => 'facebook',
            'link' => carbon_get_theme_option('facebook_url')
        ],
        [
            'icon' => 'twitter',
            'link' => carbon_get_theme_option('twitter_url')
        ],
        [
            'icon' => 'youtube',
            'link' => carbon_get_theme_option('youtube_url')
        ],
        [
            'icon' => 'mpa',
            'link' => 'https://mypari.sh/nn7u'
        ],
    ];

    function getFooterLogo() {
        $id = carbon_get_theme_option('footer_logo');

        if (!$id) {
            return get_template_directory_uri() . '/assets/images/images/all-saints-footer-logo-01.png';
        }

        return wp_get_attachment_image_src($id, 'full')[0];
    }

?>

<div class="site-footer__widget site-footer__social footer-social">
    <a href="<?= esc_url(home_url('/')) ?>" class="footer__social-branding" style="background-image: url(<?= getFooterLogo() ?>)"></a>
    <ul class="footer__social-links">
        <?php foreach($links as $link): ?>
            <li class="footer__social-link-item">
                <a href="<?= esc_url($link['link']) ?>" target="_blank" rel="noopener" class="footer__social-link">
                    <?= get_template_part('svg/social', $link['icon']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>