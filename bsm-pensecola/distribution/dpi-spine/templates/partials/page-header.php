<?php

  function getPageHeaderBg() {
      $featuredImg = get_the_post_thumbnail_url();

      if (!is_page() || empty($featuredImg)) {
        // $featuredImg = get_template_directory_uri() . '/assets/images/page-header-' . array_rand(array_flip([1, 2]), 1) . '.jpg';
        $featuredImg = get_template_directory_uri() . '/assets/images/inner-page-placeholder2.jpg';
      }

      return $featuredImg;
  }

?>

<div class="page-header" style="background-image: url(<?= getPageHeaderBg() ?>)"></div>
