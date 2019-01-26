<?php 

    $linkBox = carbon_get_post_meta(get_the_ID(), 'welcome_cta_link_box', 'complex')[0];

?>

<section class="welcome-template__section welcome-cta mw-container">
    <?php if (!empty($linkBox)): ?>
        <div class="welcome-cta__link-box">
            <div class="welcome-cta__link-box-top">
                <p class="welcome-cta__title"><?= $linkBox['title'] ?></p>
                <a href="<?= get_page_link($linkBox['page_to_link_to'][0]) ?>" class="welcome-cta__link"><?= $linkBox['button_text'] ?></a>
            </div>
            <p class="welcome-cta__link-content"><?= $linkBox['sub_title'] ?></p>
        </div>
    <?php endif; ?>
    <div class="welcome-cta__content">
        <?= carbon_get_post_meta(get_the_ID(), 'welcome_cta_content') ?>
    </div>
</section>