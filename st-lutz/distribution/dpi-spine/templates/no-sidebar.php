<?php
/**
 * Template Name: No Sidebar
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content-page'); ?>
<?php endwhile; ?>