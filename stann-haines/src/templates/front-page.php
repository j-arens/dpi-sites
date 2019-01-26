<?php
/**
 * Template Name: Homepage Template
 */

    $components = [
        'home-main',
        'featured-links',
        'home-portals'
    ];

    get_template_part('partials/home-slider');    
?>

<div class="overlay-container">
    <?php 
        get_template_part('partials/page-header');

        foreach($components as $component) {
            get_template_part('partials/' . $component);
        } 
    ?>
</div>
