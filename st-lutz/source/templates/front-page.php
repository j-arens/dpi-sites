<?php
/**
 * Template Name: Homepage Template
 */

    $components = [
        'mass-times',
        'news',
        'featured-links',
        'feeds',
        'linkbanner',
        'media-center'
    ];

    if (empty($components)) {
        print '<Uh oh, there aren\'t any homepage components!</p>';
        exit();
    }

    foreach($components as $comp) {
        get_template_part('partials/' . $comp);
    }

?>