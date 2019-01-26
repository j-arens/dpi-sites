<?php

    $bannerImg = wp_get_attachment_image_src(carbon_get_the_post_meta('home_banner_img'), 'medium');

?>

<section class="banner" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/home-banner-bg.png' ?>)">
    <div class="banner__container mw-container">
        <?php if (!empty($bannerImg)): ?>
            <img src="<?= $bannerImg[0] ?>" alt="Banner Image" class="banner__img">
        <?php endif; ?>
        <p class="banner__content">
            <?= carbon_get_the_post_meta('home_banner_content') ?>
        </p>
        <div class="banner__btn-container">
            <a 
                href="<?= esc_url(carbon_get_the_post_meta('home_banner_btn_link')) ?>" 
                class="banner__btn btn btn-inverse"
                <?= carbon_get_the_post_meta('home_banner_open_in_new_tab') === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
            >
                <?= carbon_get_the_post_meta('home_banner_btn_text') ?>
            </a>
        </div>
    </div>
</section>