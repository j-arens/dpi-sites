<?php

  if (!is_single() && !is_archive()) {
    $bg_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
  }

  if (empty($bg_img)) {
    $bg_img = get_template_directory_uri() . '/assets/images/page-placeholder-' . array_rand(array_flip([1, 2, 3]), 1) . '.jpg';
  }

?>

<div class="page-header" style="background-image: url(<?=$bg_img?>">
  <div class="overlay"></div>
  <?php if ( is_search() ): ?>
    <h1><?='Search: ' . get_search_query();?></h1>
  <?php elseif ( is_archive() ): ?>
    <h1>News and Events</h1>
  <?php else: ?>
    <h1><?=get_the_title();?></h1>
  <?php endif ?>
</div>
