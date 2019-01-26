<?php get_template_part('partials/page-header'); ?>

<!-- is_home is actually for blog pages, doesn't necessarily evaluate to true on the front page -->
<!-- load category filter component if blog(news) page -->
<?php if (is_home()) get_template_part('partials/filter-category'); ?> 

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'spine'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php 
  the_posts_navigation([
    'prev_text' => file_get_contents(__DIR__ . '/svg/arrow-left.php') . ' Older Posts', 
    'next_text' => 'Newer Posts ' . file_get_contents(__DIR__ . '/svg/arrow-right.php')
  ]); 
?>
