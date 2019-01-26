<article <?php post_class(); ?>>
  <div class="entry-content">
    <?php if (has_post_thumbnail()): ?>
      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="post-thumbnail" class="post-thumbnail" />
    <?php endif; ?>
    <?php the_content(); ?>
  </div>
  <footer class="single__footer">
    <nav class="pagination-nav">
      <?php 
        previous_post_link('<a class="prev-link" %link', file_get_contents(dirname(__DIR__) . '/svg/arrow-left.php') . ' Previous Post');
        next_post_link('<a class="next-link" %link', 'Next Post ' . file_get_contents(dirname(__DIR__) . '/svg/arrow-right.php'));
      ?>
  </nav>
  </footer>
</article>
