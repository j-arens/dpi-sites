<?php
/**
 * Template Name: Homepage Template
 */

 $components = [
   'mass-times',
   'home-featured',
   'home-icon-boxes',
   'home-bulletins'
 ];

 foreach( $components as $component ) {
   get_template_part( 'partials/' . $component );
 }
?>
