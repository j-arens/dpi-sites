<?php
  function getPageHeaderBg() {
      $featuredImg = get_the_post_thumbnail_url();
      if (!is_page() || empty($featuredImg)) {
        $featuredImg = get_template_directory_uri() . '/assets/images/inner-page-placeholder.jpg';
      }
      return $featuredImg;
  }
?>

<div class="page-header" style="background-image: url(<?= getPageHeaderBg() ?>)">
  <div class="page-header__container mw-container">
      <?php if ( is_search() ): ?>
        <h1 class="page-header__title"><?php echo 'Search: ' . get_search_query(); ?></h1>
      <?php elseif ( is_404() ): ?>
        <h1 class="page-header__title">Not Found</h1>
      <?php elseif ( is_archive() ): ?>
        <h1 class="page-header__title"><?php echo ucfirst(get_post_type()); ?> Archive</h1>
      <?php elseif (is_home()): ?>
        <h1 class="page-header__title">Our Blog</h1>
      <?php else: ?>
        <h1 class="page-header__title"><?php echo get_the_title(); ?></h1>
      <?php endif ?>
  </div>
</div>
