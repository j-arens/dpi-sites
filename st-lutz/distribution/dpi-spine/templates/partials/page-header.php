<?php

  function getPageHeaderBg() {
    $featuredImg = get_the_post_thumbnail_url();

    if (!is_page() || empty($featuredImg)) {
      $featuredImg = get_template_directory_uri() . '/assets/images/header-placeholder-1.jpg';
    }

    return $featuredImg;
  }

  function getArchiveTitle() {
    $postType = get_post_type_object(get_post_type());
    return $postType->labels->menu_name;
  }

?>

<div class="page-header" style="background-image: url(<?= getPageHeaderBg() ?>)">
  <button id="js-menu-toggle" class="page-header__menu-toggle btn__round-toggle">
      <?= get_template_part('svg/toggle', 'hamburger') ?>
      Menu
  </button>
  <a href="<?= esc_url(home_url('/')) ?>" class="page-header__branding" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/st-tims-logo-01.png' ?>)"></a>
  <?php if ( is_search() ): ?>
    <h1 class="page-header__title"><?php echo 'Search: ' . get_search_query(); ?></h1>
  <?php elseif ( is_404() ): ?>
    <h1 class="page-header__title">Not Found</h1>
  <?php elseif ( is_archive() ): ?>
    <h1 class="page-header__title"><?= getArchiveTitle() ?></h1>
  <?php else: ?>
    <h1 class="page-header__title"><?php echo get_the_title(); ?></h1>
  <?php endif ?>
</div>
