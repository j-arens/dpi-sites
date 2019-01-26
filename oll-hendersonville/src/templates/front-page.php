<?php
/**
 * Template Name: Homepage Template
 */


 $components = [
     'home-slider',
     'mass-times',
     'home-news',
     'partners'
 ];

 foreach($components as $component) {
     get_template_part('partials/' . $component);
 }

?>
