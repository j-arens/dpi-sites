<article>
  <?php
    if ( is_archive() ) {
      echo '<h1 class="page-header"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h1>';
      the_excerpt();
    } else {
      echo '<h1 class="page-header">' . get_the_title() . '</h1>';
      the_content();
    }
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'spine'), 'after' => '</p></nav>']);
  ?>
</article>
