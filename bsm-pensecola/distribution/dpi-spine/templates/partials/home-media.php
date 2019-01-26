<?php

    wp_reset_postdata();

    $headingTitle = 'Media Center';
    $headingLink = '';
    $headingLinkText = '';

    $Controller = Bulletins\Plugin\Controller::getInstance();
    $bulletinID = $Controller->getBulletinID();
    $bulletins = $Controller->Transport->getBulletins($bulletinID, 5);

    $video = [
        'bg' => wp_get_attachment_image_src(carbon_get_the_post_meta('home_video_image'), 'medium')[0] ?: get_template_directory_uri() . '/assets/images/video-bg.jpg',
        'linkText' => carbon_get_the_post_meta('home_video_link_text') ?: 'Latest Videos',
        'linkURL' => get_page_link(carbon_get_the_post_meta('home_video_link_url')[0]) ?: '#'
    ];

    $app = [
        'bg' => wp_get_attachment_image_src(carbon_get_the_post_meta('home_mpa_image'), 'medium')[0] ?: get_template_directory_uri() . '/assets/images/mpa-bg.jpg',
        'linkText' => carbon_get_the_post_meta('home_mpa_link_text') ?: 'Our App',
        'linkURL' => get_page_link(carbon_get_the_post_meta('home_mpa_link_url')[0]) ?: '#'
    ];

    $gallery = [
        'bg' => wp_get_attachment_image_src(carbon_get_the_post_meta('home_gallery_image'), 'medium')[0] ?: get_template_directory_uri() . '/assets/images/mpa-bg.jpg',
        'linkText' => carbon_get_the_post_meta('home_gallery_link_text') ?: 'Our App',
        'linkURL' => get_page_link(carbon_get_the_post_meta('home_gallery_link_url')[0]) ?: '#'
    ];

?>

<section class="home-media">
    <div class="home-media__container mw-container">
        <?php include locate_template('partials/home-heading.php') ?> 
        <ul class="home-media__list">
            <li class="home-media__item home-media__item-full" style="background-image: url(<?= $video['bg'] ?>)">
                <a href="<?= $video['linkURL'] ?>" class="home-media__item-link">
                    <span class="home-media__item-link-desc">
                        <?= $video['linkText'] ?>
                    </span>
                </a>
            </li>
            <li class="home-media__item home-media--flex-col">
                <div class="home-media__galleries">
                    <a href="<?= $app['linkURL'] ?>" class="home-media__gallery-link" style="background-image: url(<?= $app['bg'] ?>)">
                        <span class="home-media__gallery-link-desc">
                            <?= $app['linkText'] ?>
                        </span>
                    </a>
                    <a href="<?= $gallery['linkURL'] ?>" class="home-media__gallery-link" style="background-image: url(<?= $gallery['bg'] ?>)">
                        <span class="home-media__gallery-link-desc">
                            <?= $gallery['linkText'] ?>
                        </span>
                    </a>
                </div>
                <div class="home-media__bulletins">
                    <?php if(!(empty($bulletins))): ?>
                        <?php $currentBulletin = array_shift($bulletins) ?>
                        <a href="<?= $currentBulletin['links']['bulletin'] ?>" target="_blank" rel="noopener" class="home-media__current-bulletin" style="background-image: url(<?= $currentBulletin['links']['cover'] ?>)">
                            <p class="home-media__bulletin-date">Current Bulletin</p>
                        </a>
                        <div class="home-media__bulletins-archived">
                            <?php foreach($bulletins as $bulletin) { ?>
                                <a href="<?= $bulletin['links']['bulletin'] ?>" class="home-media__bulletins-link" target="_blank" rel="noopener">
                                    <?= $bulletin['date'] ?>
                                </a>
                            <?php } ?>
                            <p class="home-media__bulletin-date">Archived Bulletins</p>
                        </div>
                    <?php else: ?>
                        <p class="home-media__bulletins-empty">Sorry, there aren't any bulletins to show you right now.</p>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
</section>