<?php
/**
 * Template Name: Homepage Template
 */

 $home_templates = [
   'home-slider',
   'home-about',
   'home-video',
   'home-news',
   'home-donate',
   'home-contact'
 ];

 foreach($home_templates as $template) {
   get_template_part('partials/' . $template);
 }

?>
