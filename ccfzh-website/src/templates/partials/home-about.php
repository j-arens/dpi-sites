<?php

$content_image = wp_get_attachment_image_url( get_option("Video_Image_ImageUpload_387"), 'large' );

$icon_1 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_347"), 'thumbnail' );

$icon_2 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_379"), 'thumbnail' );

$icon_3 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_474"), 'thumbnail' );

?>

<!-- about section -->
<section class="about">
  <div class="container will-animate">
    <h1 class="section-title"><?php echo get_option("Title_Text_430"); ?></h1>
    <div class="main-message">
      <div class="dpi-videoPlayer__preview featured-image" style="background-image: url(<?php echo $content_image; ?>)">
        <a class="play-btn" href="<?php echo get_option("Video_Link_Text_486"); ?>"></a>
      </div>
      <div class="content">
        <h2><?php echo get_option("Welcome_Message_Title_Text_278"); ?></h2>
        <p><?php echo get_option("Welcome_Message_TextArea_420"); ?></p>
        <a class="btn btn-primary" href="<?php echo get_option("Button_Link_Text_374"); ?>"><?php echo get_option("Button_Title_Text_383"); ?></a>
        <a class="btn btn-primary" href="<?php echo get_option("Button_Link_Text_391"); ?>"><?php echo get_option("Button_Title_Text_345"); ?></a>
      </div>
    </div>
    <div class="call-to-action will-animate">
      <div class="icon-box">
        <a class="wrapper-link" href="<?php echo get_option("Link_URL_Text_342"); ?>">
          <aside>
            <span style="background-image: url(<?php echo $icon_1; ?>);"></span>
          </aside>
          <h3><?php echo wp_trim_words( get_option("Title_Text_469"), 3, '...' ); ?></h3>
          <p><?php echo wp_trim_words( get_option("Message_TextArea_403"), 10, '...' ); ?></p>
          <a class="link" href="<?php echo get_option("Link_URL_Text_342"); ?>"><?php echo get_option("Link_Title_Text_307"); ?></a>
        </a>
      </div>
      <div class="icon-box">
        <a class="wrapper-link" href="<?php echo get_option("Link_URL_Text_365"); ?>">
          <aside>
            <span style="background-image: url(<?php echo $icon_2; ?>);"></span>
          </aside>
          <h3><?php echo wp_trim_words( get_option("Title_Text_398"), 3, '...' ); ?></h3>
          <p><?php echo wp_trim_words( get_option("Message_TextArea_381"), 10, '...' ); ?></p>
          <a class="link" href="<?php echo get_option("Link_URL_Text_365"); ?>"><?php echo get_option("Link_Title_Text_364"); ?></a>
        </a>
      </div>
      <div class="icon-box">
        <a class="wrapper-link" href="<?php echo get_option("Link_URL_Text_317"); ?>">
          <aside>
            <span style="background-image: url(<?php echo $icon_3; ?>);"></span>
          </aside>
          <h3><?php echo wp_trim_words( get_option("Title_Text_257"), 3, '...' ); ?></h3>
          <p><?php echo wp_trim_words( get_option("Message_TextArea_261"), 10, '...' ); ?></p>
          <a class="link" href="<?php echo get_option("Link_URL_Text_317"); ?>"><?php echo get_option("Link_Title_Text_461"); ?></a>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- end about section -->
