<?php
/**
* Template Name: Ministries Page
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/page-header'); ?>
  <?php get_template_part('partials/content-ministries'); ?>
<?php endwhile; ?>