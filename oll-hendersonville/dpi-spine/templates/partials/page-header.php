<?php 

  $featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0];

  if (is_single() || 
      is_search() || 
      is_404() || 
      is_archive() || 
      empty($featuredImage)) {
        $featuredImage = get_template_directory_uri() . '/assets/images/page-header-bg.jpg';
      }

?>

<div class="page-header" style="background-image: url(<?= $featuredImage ?>)">
  <?php if ( is_search() ): ?>
    <h1 class="page-header__title font-yk"><?php echo 'Search: ' . get_search_query(); ?></h1>
  <?php elseif ( is_404() ): ?>
    <h1 class="page-header__title font-yk">Not Found</h1>
  <?php elseif ( is_archive() ): ?>
    <h1 class="page-header__title font-yk"><?php echo ucfirst(get_post_type()); ?> Archive</h1>
  <?php else: ?>
    <h1 class="page-header__title font-yk"><?php echo get_the_title(); ?></h1>
  <?php endif ?>
</div>
