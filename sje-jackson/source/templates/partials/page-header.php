<?php

  $bgImage = get_the_post_thumbnail_url();

  if (!is_page() || empty($bgImage)) {
    $bgImage = get_template_directory_uri() . '/assets/images/page-header-' . array_rand(array_flip([1, 2]), 1) . '.jpg';
  }

?>

<div class="page-header" style="background-image: url(<?= $bgImage ?>)">
  <div class="page-header__container mw-container">
    <?php if ( is_search() ): ?>
      <h1 class="page-header__title"><?= 'Search: ' . get_search_query(); ?></h1>
    <?php elseif ( is_404() ): ?>
      <h1 class="page-header__title">Not Found</h1>
    <?php elseif ( is_archive() ): ?>
      <h1 class="page-header__title"><?= ucfirst(get_post_type()); ?> Archive</h1>
    <?php elseif (is_home()): ?>
      <h1 class="page-header__title">News</h1>
    <?php else: ?>
      <h1 class="page-header__title"><?= get_the_title(); ?></h1>
    <?php endif ?>
  </div>
</div>
