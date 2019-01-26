<?php

    $linksDefaults = [
        [
            'image' => get_template_directory_uri() . '/assets/images/birdhouse.png',
            'link_url' => '#'
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/oscc.png',
            'link_url' => '#'
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/cross.png',
            'link_url' => '#'
        ]
    ];

    $links = array_replace($linksDefaults, get_field('image_links'));

?>

<div class="featured-links">
    <div class="featured-links--user">
        <?php foreach($links as $link) { ?>
            <a href="<?= $link['link_url'] ?>" class="featured-links--link">
                <img class="featured-links--link-image" src="<?= $link['image'] ?>" class="featured-links--link-image">
            </a>
        <?php } ?>
    </div>
    <div class="featured-links--social">
        <p class="featured-links--social-content">
            We can do more for the Lord togther... Come join us!
        </p>
        <a class="featured-links--social-button" href="<?= get_field('join_us_page_link') ?>">
            Join
        </a>
        <a class="featured-links--fb-button" href="<?= get_field('facebook_link') ?: '#' ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408.8 408.8">
                <path d="M353.7 0H55.1C24.7 0 0 24.7 0 55.1v298.6c0 30.4 24.7 55.1 55.1 55.1h147.3l0.3-146.1h-38c-4.9 0-8.9-4-9-8.9l-0.2-47.1c0-5 4-9 9-9h37.9v-45.5c0-52.8 32.2-81.5 79.3-81.5h38.7c4.9 0 9 4 9 9v39.7c0 4.9-4 9-8.9 9l-23.7 0c-25.6 0-30.6 12.2-30.6 30v39.4h56.3c5.4 0 9.5 4.7 8.9 10l-5.6 47.1c-0.5 4.5-4.4 7.9-8.9 7.9h-50.5l-0.3 146.1h87.6c30.4 0 55.1-24.7 55.1-55.1V55.1C408.8 24.7 384.1 0 353.7 0z" fill="#475993"/>
            </svg>
            Like Us
        </a>
        <img src="<?= get_template_directory_uri() . '/assets/images/stfrancis.png' ?>" class="featured-links--social-img">
    </div>
    <p class="featured-links--quote">
        "We are brothers and sisters in Christ who gather to worship God and witness our Catholic faith by serving the community"
    </p>
</div>