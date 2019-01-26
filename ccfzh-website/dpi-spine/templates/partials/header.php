<?php

$icon_logo = wp_get_attachment_image_url( get_option("Logo_Icon_ImageUpload_378"), 'large' );

$text_logo = wp_get_attachment_image_url( get_option("Logo_Text_ImageUpload_333"), 'large' );

?>

<header class="site-header">

  <!-- branding -->
  <a class="brand logo-icon" href="<?= esc_url(home_url('/')); ?>">
    <img src="<?php echo $icon_logo ?>" alt="logo icon" />
  </a>
  <a class="brand logo-text" href="<?= esc_url(home_url('/')); ?>">
    <img src="<?php echo $text_logo  ?>" alt="logo text" />
  </a>
  <!-- end branding -->

  <div class="controls">
    <?php echo do_shortcode('[google-translator]'); ?>
    <!-- <button id="translator" class="btn btn-default" type="button" name="langauge">Espanol</button> -->
    <a class="btn btn-default" href="<?= esc_url(home_url('/hollandzeeland')); ?>">Login</a>
    <?php get_search_form() ?>
  </div>

  <!-- site size control -->
  <!-- <div id="zoom">
    <p>Font Size</p>
    <span class="small" data-zoom="1">A</span>
    <span class="medium" data-zoom="1.1">A</span>
    <span class="large" data-zoom="1.2">A</span>
  </div> -->
  <!-- end site size control -->

  <!-- site navigation -->
  <?php echo do_shortcode( '[dpi_mega_menu menu_name="primary-menu"]' ); ?>
  <!-- end site navigation -->

</header>
