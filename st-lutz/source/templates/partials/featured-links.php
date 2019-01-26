<?php

    wp_reset_postdata();

    $links = [
        [
            'title' => 'Mass Schedule',
            'icon' => 'chalice',
            'text' => carbon_get_the_post_meta('mass_schedule_text'),
            'link' => carbon_get_the_post_meta('mass_schedule_link')
        ],
        [
            'title' => 'Bulletin',
            'icon' => 'bulletin',
            'text' => carbon_get_the_post_meta('bulletin_text'),
            'link' => carbon_get_the_post_meta('bulletin_link')
        ],
        [
            'title' => 'Prayer Requests',
            'icon' => 'prayer',
            'text' => carbon_get_the_post_meta('prayer_request_text'),
            'link' => carbon_get_the_post_meta('prayer_request_link')
        ],
        [
            'title' => 'Join Parish',
            'icon' => 'avatar-plus',
            'text' => carbon_get_the_post_meta('prayer_request_text'),
            'link' => carbon_get_the_post_meta('prayer_request_link')
        ],
    ];

?>

<section class="featured-links">
    <div class="featured-links__container mw-container">
        <?php foreach($links as $link) { ?>
            <a href="<?= $link['link'] ?>" class="featured-links__link">
                <?= get_template_part('svg/' . $link['icon']) ?>
                <p class="featured-links__title"><?= $link['title'] ?></p>
                <p class="featured-links__excerpt"><?= $link['text'] ?></p>
            </a>
        <?php } ?>
    </div>
</section>