<div class="mb-wrap">
  <article class="mw-container clearfix">
    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </article>
</div>
