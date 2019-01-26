<?= get_template_part('partials/page-header') ?>
<div class="content">
  <?php

    if (have_posts()) {
      
      if (is_home()) {
        get_template_part('partials/category-picker');
      }

      while (have_posts()) {
        the_post();
        get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
      }

      the_posts_navigation();

    } else {

      ?>

        <div class="not-found">
          <div class="alert alert-warning">
            <?= _e('Sorry, no results were found.', 'spine') ?>
          </div>
          <?= get_search_form() ?>
        </div>

      <?php

    }

  ?>
</div>