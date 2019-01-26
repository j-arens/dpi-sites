<?php
/**
 * Template Name: Homepage Template
 */


    $components = [
        'home-slider',
        'home-featured-links',
        'fw-banner-top',
        'home-news',
        'fw-banner-bottom',
        'home-media'
    ];

    if (empty($components)) {
        print '<Uh oh, there aren\'t any homepage components!</p>';
        exit();
    }

    foreach($components as $comp) {
        get_template_part('partials/' . $comp);
    }

?>
