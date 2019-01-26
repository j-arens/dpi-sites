<?php
/**
 * Template Name: Homepage Template
 */

 $homeComponents = [
    'home-slider',
    'home-links',
    'home-events',
    'home-feeds'
 ];

 foreach($homeComponents as $comp) {
     get_template_part('partials/' . $comp);
 }

?>
