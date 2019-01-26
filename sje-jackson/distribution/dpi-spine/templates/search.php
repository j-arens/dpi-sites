<?php get_template_part('partials/page-header'); ?>

<?php if (!have_posts()) : ?>
  <div class="no-posts">
    <p class="no-posts__message">Sorry, we couldn't find anything. Try another search?</p>
    <?php get_search_form(); ?>
  </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content-search'); ?>
<?php endwhile; ?>

<?php 
  the_posts_navigation([
    'prev_text' => file_get_contents(__DIR__ . '/svg/arrow-left.php') . ' Older Posts', 
    'next_text' => 'Newer Posts ' . file_get_contents(__DIR__ . '/svg/arrow-right.php')
  ]); 
?>
