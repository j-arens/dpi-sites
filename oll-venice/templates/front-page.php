<?php
/**
 * Template Name: Homepage Template
 */

    $components = [
        'home-slider',
        'big-links',
        'home-intro',
        'quote-slider',
        'home-feeds',
        'banner',
        'featured-news',
        'quick-links'
    ];

    if (empty($components)) {
        print '<Uh oh, there aren\'t any homepage components!</p>';
        exit();
    }

    foreach($components as $comp) {
        get_template_part('partials/' . $comp);
    }

?>
