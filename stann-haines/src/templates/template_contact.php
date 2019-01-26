<?php
/**
* Template Name: Contact Page
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/page-header'); ?>
  <?php get_template_part('partials/content-contact'); ?>
<?php endwhile; ?>