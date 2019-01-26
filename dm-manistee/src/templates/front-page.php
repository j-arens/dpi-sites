<?php
/**
 * Template Name: Homepage Template
 */

$components = [
    'home-slider',
    'home-featured-links',
    'home-tabs',
    'home-mass-times',
    'home-events',
    'parish-partners'
];

foreach( $components as $component ) {
    get_template_part('partials/' . $component);
}

?>
