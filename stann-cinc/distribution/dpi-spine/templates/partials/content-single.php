<?= get_template_part('partials/page-header') ?>
<article class="mw-container clearfix" <?php post_class(); ?>>
<a class="back-to-news" href="<?= esc_url(home_url('/')) ?>our-blog/">&lt; All Blog Posts</a>
  <?= get_template_part('partials/page-title') ?>
  <div class="entry-content">
    <?php if (has_post_thumbnail()): ?>
      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="post-thumbnail" class="post-thumbnail alignleft" />
    <?php endif; ?>
    <?php the_content(); ?>
  </div>
</article>