<section class="content-container content-container--blue">
  <article class="page-article">
    <h1 class="page-title font-light"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </article>
  <?php if (display_sidebar()) : ?>
    <aside class="sidebar">
      <?php template_part('partials/sidebar'); ?>
    </aside>
  <?php endif; ?>
</section>
