<?php


    $bannerItems = [
        [
            'bg' => get_template_directory_uri() . '/assets/images/stay-connected-bg.png'
        ],
        [
            'bg' => get_template_directory_uri() . '/assets/images/giving-link-bg.png'
        ]
    ]


?>

<section class="linkbanner">
    <div class="linkbanner__half" style="background-image: url(<?= $bannerItems[0]['bg'] ?>)">
        <div class="linkbanner__content">
            <p class="linkbanner__title">Stay Connected</p>
            <ul class="linkbanner__social-links">
                <li class="linkbanner__social-link">
                    <a href="<?= carbon_get_theme_option('facebook_url') ?>" target="_blank" rel="noopener" class="linkbanner__link">
                        <?= get_template_part('svg/facebook-circ') ?>
                    </a>
                </li>
                <li class="linkbanner__social-link">
                    <a href="<?= carbon_get_theme_option('twitter_url') ?>" target="_blank" rel="noopener" class="linkbanner__link">
                        <?= get_template_part('svg/twitter-circ') ?>
                    </a>
                </li>
                <li class="linkbanner__social-link">
                    <a href="<?= carbon_get_theme_option('vimeo_url') ?>" target="_blank" rel="noopener" class="linkbanner__link">
                        <?= get_template_part('svg/vimeo-circ') ?>
                    </a>
                </li>
                <li class="linkbanner__social-link">
                    <a href="http://myparishapp.com/" target="_blank" rel="noopener" class="linkbanner__link">
                        <?= get_template_part('svg/mpa-circ') ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="linkbanner__half" style="background-image: url(<?= $bannerItems[1]['bg'] ?>)">
        <div class="linkbanner__content">
            <p class="linkbanner__title">Giving</p>
            <a href="<?= carbon_get_the_post_meta('giving_link_url') ?>" target="_blank" rel="noopener" class="linkbanner__link-btn">
                <?= carbon_get_the_post_meta('giving_link_text') ?>
            </a>
        </div>
    </div>
</section>