<?php
/**
 * Template Name: Homepage Template
 */

    $components = [
        'home-slider',
        'block-links',
        'home-calendar',
        'featured-posts',
        'featured-links',
        'mpa-feed'
    ];

    if (empty($components)) {
        print '<Uh oh, there aren\'t any homepage components!</p>';
        exit();
    }

    foreach($components as $comp) {
        get_template_part('partials/' . $comp);
    }

?>
