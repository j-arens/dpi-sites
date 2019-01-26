<?php
/**
 * Template Name: Mass Times Page
 */
 ?>

 <?php while (have_posts()) : the_post(); ?>
   <?php get_template_part('partials/content-page'); ?>
 <?php endwhile; ?>
