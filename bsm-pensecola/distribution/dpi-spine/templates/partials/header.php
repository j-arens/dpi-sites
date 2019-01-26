<?php

    function getLogo() {
        $logo = carbon_get_theme_option('site_logo_image');

        if (!$logo) {
            return get_template_directory_uri() . '/assets/images/bsm-pensecola-logo.png';
        }

        return wp_get_attachment_image_src($logo, 'full')[0];
    }

    function getSocialLinks() {
        $links = [
            [
                'fieldName' => 'facebook_link',
                'icon' => 'facebook',
                'url' => '#'
            ],
            [
                'fieldName' => 'twitter_link',
                'icon' => 'twitter',
                'url' => '#'
            ],
            [
                'fieldName' => 'mpa_link',
                'icon' => 'mpa',
                'url' => '#'
            ]
        ];

        return array_map(function($link) {

            $url = carbon_get_theme_option($link['fieldName']);

            if (!empty($url)) {
                $link['url'] = $url;
            }

            return $link;

        }, $links);
    }

?>

<header class="site-header">
    <div class="site-header__container mw-container">
        <div class="site-header__branding">
            <a href="<?= esc_url(home_url('/')) ?>" class="site-header__logo-link">
                <img src="<?= getLogo() ?>" alt="Bascilica of St. Michael logo" class="site-header__logo-img">
            </a>
        </div>
        <div class="site-header__links">
            <div class="site-header__quick-links">
                <a href="<?= carbon_get_theme_option('nrhp_link') ?>" class="site-header__heritage-link"></a>
                <ul class="site-header__social-links">
                    <?php foreach(getSocialLinks() as $link) { ?>
                        <li class="site-header__social-link-item">
                            <a href="<?= $link['url'] ?>" class="site-header__social-link" target="_blank" rel="noopener">
                                <?= get_template_part('svg/' . $link['icon']) ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="site-header__social-link-item js-search-toggle">
                        <a href="#" class="site-header__social-link" target="_blank" rel="noopener">
                            <?= get_template_part('svg/search') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="site-header__nav-container mw-container">
        <?= get_template_part('partials/site-nav') ?>
    </div>
</header>
