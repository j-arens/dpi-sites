<?php

    $heading = 'Media Center';

    $mediaItems = [
        [
            'title' => 'FORMED',
            'icon' => 'play',
            'link' => carbon_get_the_post_meta('formed_link_url'),
            'thumbnail' => carbon_get_the_post_meta('formed_featured_img') ?: get_template_directory_uri() . '/assets/images/media-center-bible.jpg'
        ],
        [
            'title' => 'Fr. Malley\'s Blog',
            'icon' => 'speech-blurb',
            'link' => carbon_get_the_post_meta('fr_malleys_blog_link_url'),
            'thumbnail' => carbon_get_the_post_meta('fr_malleys_blog_featured_img') ?: get_template_directory_uri() . '/assets/images/frmalley.jpg'
        ],
        [
            'title' => 'Newsletter',
            'icon' => 'newspaper',
            'link' => carbon_get_the_post_meta('newsletter_link_url'),
            'thumbnail' => carbon_get_the_post_meta('newsletter_featured_img') ?: get_template_directory_uri() . '/assets/images/newsletter.jpg'
        ],
        [
            'title' => 'Fr. Kevin\'s Blog',
            'icon' => 'mic',
            'link' => carbon_get_the_post_meta('fr_kevins_blog_link_url'),
            'thumbnail' => carbon_get_the_post_meta('fr_kevins_blog_featured_img') ?: get_template_directory_uri() . '/assets/images/blog.jpg'
        ]
    ];

    function genThumbnails($items) {
        array_walk($items, function($item, $i) {

            $imgSrc = is_numeric($item['thumbnail']) ? wp_get_attachment_image_src($item['thumbnail'], 'large')[0] : $item['thumbnail'];

            ?>
                <div 
                    class="media-center__link-thumbnail <?= $i === 0 ? 'media-center__thumbnail-active' : '' ?>" 
                    style="background-image: url(<?= $imgSrc ?>)">
                </div>
            <?php
        });
    }

?>

<section id="js-media-center-root" class="media-center">
    <?php include locate_template('partials/component-title.php'); ?>
    <div class="media-center__container mw-container--pad">
        <figure class="media-center__thumbnail-window">
            <?= genThumbnails($mediaItems) ?>
        </figure>
        <ul class="media-center__portal">
            <?php foreach($mediaItems as $item) { ?>
                <li class="media-center__portal-item">
                    <a href="<?= $item['link'] ?>" target="_blank" rel="noopener" class="media-center__link">
                        <?= get_template_part('svg/' . $item['icon']) ?>
                        <p class="media-center__link-title"><?= $item['title'] ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>