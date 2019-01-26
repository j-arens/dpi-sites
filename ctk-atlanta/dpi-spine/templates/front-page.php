<?php

 $components = [
   'home-intro',
   'home-links',
   'home-events',
   'home-calendar',
   'home-media',
   'home-affiliates'
 ];

 foreach( $components as $component ) {
   get_template_part( 'partials/' . $component );
 }
?>
