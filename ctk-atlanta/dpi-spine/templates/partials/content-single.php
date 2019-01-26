<article <?php post_class(); ?>>
  <?php if ( get_post_type() === 'pastors_corner' ): ?>
    <h1>Rector's Desk / <?php echo get_the_title(); ?></h1>
  <?php endif; ?>
  <?php if ( get_post_type() === 'parish_events' ): ?>
    <h1><?php echo ucwords( str_replace( '_', ' ', get_post_type() ) ) . ' / ' . get_the_title(); ?></h1>
    <h3>Event Date: <?php echo date( 'M j, Y', strtotime( get_post_meta( $post->ID, 'event_info_event-date', true ) ) ) ?></h3>
  <?php endif; ?>
  <div class="entry-content">
    <?php the_content(); ?>
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
