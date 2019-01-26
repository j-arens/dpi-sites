<?php
/**
 * Template Name: Homepage Template
 */


$home_templates = [
  'home-mass-times',
  'home-featured',
  'home-info',
  'home-bulletins',
  'home-quote'
];

foreach( $home_templates as $template ) {
  get_template_part( 'partials/' . $template );
}
