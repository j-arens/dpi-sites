<?php get_template_part('partials/page-header'); ?>

<?php if (!have_posts()) : ?>
  <section class="content-container content-container--blue">
    <div class="no-posts">
      <p>Sorry, we couldn't find anything. Try another search?</p>
      <?php get_search_form(); ?>
    </div>
  </section>
<?php else: ?>
  <section class="content-container content-container--blue">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('partials/content-search'); ?>
    <?php endwhile; ?>
    <?php the_posts_navigation(); ?>
  </section>
<?php endif; ?>
