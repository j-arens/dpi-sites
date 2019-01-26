<?php

    $bgImage = carbon_get_post_meta(get_the_ID(), 'welcome_banner_bg');

    if (empty($bgImage)) {
        $bgImage = get_template_directory_uri() . '/assets/images/welcome-banner.jpg';
    }

?>

<section class="giving-template__section giving-banner" style="background-image: url(<?= $bgImage ?>)">
    <div class="giving-banner__container mw-container">
        <div class="giving-banner__content">
            <?= carbon_get_post_meta(get_the_ID(), 'giving_banner_content') ?>
        </div>
        <a href="<?= carbon_get_post_meta(get_the_ID(), 'giving_banner_btn_link') ?>" class="giving-banner__link">
            <?= carbon_get_post_meta(get_the_ID(), 'giving_banner_btn_text') ?>
        </a>
    </div>
</section>