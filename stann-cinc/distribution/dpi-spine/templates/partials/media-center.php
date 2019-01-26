<?php

    $iframe = carbon_get_the_post_meta('video_embed_iframe') ?: '<iframe width="560" height="315" src="https://www.youtube.com/embed/ZuIIWTANkuQ?ecver=1" frameborder="0" allowfullscreen></iframe>';

?>

<section class="media-center">
    <div class="media-center__wrap">
        <div class="media-center__video">
            <?= $iframe ?>
        </div>
        <ul class="media-center__links">
            <li class="media-center__link-item">
                <a href="<?= get_page_link(carbon_get_the_post_meta('secondary_link_1_page_link')[0]) ?>" class="media-center__link">
                    <?= carbon_get_the_post_meta('secondary_link_1_text') ?>
                </a>
            </li>
            <li class="media-center__link-item">
                <a href="<?= get_page_link(carbon_get_the_post_meta('secondary_link_2_page_link')[0]) ?>" class="media-center__link">
                    <?= carbon_get_the_post_meta('secondary_link_2_text') ?>
                </a>
            </li>
            <li class="media-center__link-item">
                <a href="<?= get_page_link(carbon_get_the_post_meta('secondary_link_3_page_link')[0]) ?>" class="media-center__link">
                    <?= carbon_get_the_post_meta('secondary_link_3_text') ?>
                </a>
            </li>
        </ul>
    </div>
</section>