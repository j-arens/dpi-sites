<?php

    $socialLinks = [
        [
            'icon' => 'facebook',
            'link' => carbon_get_theme_option('facebook_url')
        ],
        [
            'icon' => 'twitter',
            'link' => carbon_get_theme_option('twitter_url')
        ],
        [
            'icon' => 'instagram',
            'link' => carbon_get_theme_option('instagram_url')
        ],
        [
            'icon' => 'mpa',
            'link' => carbon_get_theme_option('mpa_deep_link')
        ]
    ];

?>

<header class="site-header">
    <div class="site-header__container mw-container">
        <a 
            href="<?= esc_url(home_url('/')) ?>" 
            class="site-header__branding" 
            style="background-image: url(<?= get_template_directory_uri() . '/assets/images/header-logo-01.svg' ?>)">
        </a>
        <div class="site-header__links">
            <ul class="site-header__social-links">
                <li class="site-header__social-link-item">
                    <a href="#" class="site-header__social-link js-search-toggle">
                        <?= get_template_part('svg/search') ?>
                    </a>
                </li>
                <?php if (!empty($socialLinks)): ?>
                    <?php foreach($socialLinks as $link): ?>
                        <li class="site-header__social-link-item">
                            <a href="<?= esc_url($link['link']) ?>" target="_blank" rel="noopener" class="site-header__social-link">
                                <?= get_template_part('svg/' . $link['icon']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?= get_template_part('partials/site-nav') ?>
            <?= do_shortcode('[dpi_mm menu="primary_navigation"]') ?>
        </div>
    </div>
</header>
