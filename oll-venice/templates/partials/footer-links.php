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

<div class="site-footer__links site-footer__col">
    <a 
        href="<?= esc_url(home_url('/')) ?>" 
        class="site-footer__link-logo" 
        style="background-image: url(<?= get_template_directory_uri() . '/assets/images/header-logo-01.svg' ?>)">
    </a>
    <ul class="site-footer__links-social">
    <?php foreach($socialLinks as $link): ?>
        <li class="site-footer__links-social-item">
            <a href="<?= esc_url($link['link']) ?>" target="_blank" rel="noopener" class="site-footer__links-social-link">
                <?= get_template_part('svg/' . $link['icon']) ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>