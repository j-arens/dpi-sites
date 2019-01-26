<?php get_template_part('partials/page-header'); ?>

<!-- is_home is actually for blog pages, doesn't necessarily evaluate to true on the front page -->
<!-- load category filter component if blog(news) page -->
<?php if (have_posts() && is_home()) get_template_part('partials/filter-category'); ?> 

<?php if (!have_posts()) : ?>
  <div class="mw-container" style="padding: 2em;">
      <div class="no-results__container" style="max-width: 450px; width: 100%; margin: 0 auto; text-align: center;">
        <div class="alert alert-warning" style="margin-bottom: 1em;">
          <?php _e('Sorry, no results were found.', 'spine'); ?>
        </div>
        <?php get_search_form(); ?>
      </div>
  </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(['prev_text' => '< Previous Post', 'next_text' => 'Next Post >']); ?>
