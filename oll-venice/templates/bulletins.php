<?php
/**
 * Template Name: Bulletins
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/page-header'); ?>
  <?php get_template_part('partials/content-bulletins'); ?>
<?php endwhile; ?>