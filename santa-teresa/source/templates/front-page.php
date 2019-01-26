<?php
/**
 * Template Name: Homepage Template
 */
 
    $homeComponents = [
        'parish-info',
        'parish-news',
        'facebook-feed'
    ];
    
    foreach($homeComponents as $comp) {
        get_template_part('partials/' . $comp);
    }
 
?>
