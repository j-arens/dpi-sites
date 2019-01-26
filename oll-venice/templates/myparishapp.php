<?php
/**
 * Template Name: MyParish App
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/page-header'); ?>
  <?php get_template_part('partials/content-mpa'); ?>
<?php endwhile; ?>