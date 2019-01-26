<?php 

  $postProps = get_post_type_object(get_post_type());
  $mpaLink = get_post_type() === 'myparish_messages' ? get_post_meta(get_the_ID(), 'link', true) : '';

?>

<a href="<?= '/' . $postProps->query_var ?>" class="single__root-link" style="display: block; margin-bottom: 1em">< Back To <?= $postProps->labels->menu_name ?></a>
<article <?php post_class(); ?>>
  <div class="entry-content">
    <?php if (has_post_thumbnail()): ?>
      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="post-thumbnail" class="post-thumbnail alignleft" />
    <?php endif; ?>
    <?php the_content(); ?>
    <?= get_post_type() === 'myparish_messages' ? '<a href="' . $mpaLink . '" target="_blank" rel="noopener">' . $mpaLink . '</a>' : '' ?>
  </div>
  <footer>
    <nav class="pagination-nav">
      <?php
        previous_post_link( '<a class="prev-link" %link', '< Previous Post' );
        next_post_link( '<a class="next-link" %link', 'Next Post >' );
      ?>
    </nav>
  </footer>
</article>
