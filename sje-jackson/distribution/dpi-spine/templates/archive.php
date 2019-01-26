<?php get_template_part('partials/page-header'); ?>
<?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('partials/content-archive'); ?>
  <?php endwhile; ?>
  <nav class="pagination-nav">
    <?php next_posts_link(file_get_contents(__DIR__ . '/svg/arrow-left.php') . ' Older Posts' ); ?>
    <?php previous_posts_link('Newer Posts ' . file_get_contents(__DIR__ . '/svg/arrow-right.php')); ?>
  </nav>
<?php endif; ?>
<!-- set max number of posts in admin->reading->blog pages show at most -->
