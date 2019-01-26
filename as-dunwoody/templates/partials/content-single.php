<?php 

    $mpaLink = get_post_type() === 'myparish_messages' ? get_post_meta(get_the_ID(), 'link', true) : '';

?>

<article <?php post_class(); ?>>
  <a href="<?= esc_url(get_permalink(get_option('page_for_posts'))) ?>" class="single__root-link" style="display: block; margin-bottom: 1em">< Back To Posts</a>
  <div class="entry-content">
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
