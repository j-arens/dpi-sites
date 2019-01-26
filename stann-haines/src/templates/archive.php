<?php get_template_part('partials/page-header'); ?>
<?php if (have_posts()): ?>
  <section class="content-container content-container--blue">
  <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('partials/content-archive'); ?>
  <?php endwhile; ?>
    <nav class="pagination-nav">
      <div class="nav-previous alignleft"><?php next_posts_link( 'Older Posts' ); ?></div>
      <div class="nav-next alignright"><?php previous_posts_link( 'Newer Posts' ); ?></div>
    </nav>
  </section>
<?php endif; ?>
<!-- set max number of posts in admin->reading->blog pages show at most -->
