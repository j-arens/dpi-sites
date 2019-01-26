<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content-page'); ?>
<?php endwhile; ?>

<?php
// get_template_part('partials/page-header'); 
?>
