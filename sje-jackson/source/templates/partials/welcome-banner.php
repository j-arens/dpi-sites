<?php

    $bgImage = carbon_get_post_meta(get_the_ID(), 'welcome_banner_bg');

    if (empty($bgImage)) {
        $bgImage = get_template_directory_uri() . '/assets/images/welcome-banner.jpg';
    }

?>

<section class="welcome-template__section welcome-banner" style="background-image: url(<?= $bgImage ?>)">
    <div class="welcome-banner__container mw-container">
        <div class="welcome-banner__content">
            <?= carbon_get_post_meta(get_the_ID(), 'welcome_banner_content') ?>
        </div>
        <a href="<?= get_page_link(carbon_get_post_meta(get_the_ID(), 'welcome_banner_btn_link')[0]) ?>" class="welcome-banner__link">
            <?= carbon_get_post_meta(get_the_ID(), 'welcome_banner_btn_text') ?>
        </a>
    </div>
</section>