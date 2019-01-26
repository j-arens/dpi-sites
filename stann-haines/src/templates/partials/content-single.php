<section class="content-container content-container--blue">
  <article class="page-article">
    <h1 class="page-title font-light"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <footer>
    <nav class="pagination-nav">
      <?php
        previous_post_link( '<a class="prev-link" %link', '< Previous Post' );
        next_post_link( '<a class="next-link" %link', 'Next Post >' );
      ?>
    </nav>
  </footer>
  </article>
  <?php if (display_sidebar()) : ?>
    <aside class="sidebar">
      <?php template_part('partials/sidebar'); ?>
    </aside>
  <?php endif; ?>
</section>
