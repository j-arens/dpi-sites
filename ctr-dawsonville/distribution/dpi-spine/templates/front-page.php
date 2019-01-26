<?php
/**
 * Template Name: Homepage Template
 */

 $components = [
     'slider',
     'featured',
     'quote-slider',
     'mpa-slider'
 ];

 foreach($components as $component) {
     get_template_part('partials/' . $component);
 }


?>
