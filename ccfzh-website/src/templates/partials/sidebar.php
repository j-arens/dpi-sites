<?php

$video_img = wp_get_attachment_image_url(  get_option("Video_Screenshot_ImageUpload_463"),'medium');

$icon_1 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_418"), 'thumbnail');

$icon_2 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_309"), 'thumbnail');

$icon_3 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_270"), 'thumbnail');

?>

<div class="widget">
  <h2 class="widget-title">Invest Today</h2>
  <hr>
  <ul>
    <li><a href="<?php echo get_option("Link_1_URL_Text_414"); ?>" target="_blank"><?php echo get_option("Link_1_Text_Text_447"); ?></a></li>
  </ul>
  <a class="btn btn-center btn-primary" href="<?php echo get_option("Button_Link_Text_453"); ?>" target="_blank"><?php echo get_option("Button_Title_Text_452"); ?></a>
</div>
<div class="widget">
  <h2 class="widget-title">Prayer of St. Francis of Assisi</h2>
  <hr>
  <p><?php echo get_option("Prayer_TextArea_354"); ?></p>
</div>
<div class="widget">
  <h2 class="widget-title">Dream With Us</h2>
  <hr>
  <div class="dpi-videoPlayer__preview video-container" style="background-image: url(<?php echo $video_img; ?>);">
    <a class="play-btn" href="<?php echo get_option("Video_Link_Text_371"); ?>"></a>
  </div>
</div>
<div class="widget">
  <h2 class="widget-title">Strengthen and Strive</h2>
  <hr>
  <div class="icon-links-container">
    <a class="icon-link" href="<?php echo get_option("Link_URL_Text_287"); ?>">
      <p><?php echo get_option("Link_Title_Text_384"); ?></p>
      <span style="background-image: url(<?php echo $icon_1; ?>);"></span>
    </a>
    <a class="icon-link" href="<?php echo get_option("Link_URL_Text_372"); ?>">
      <p><?php echo get_option("Link_Title_Text_477"); ?></p>
      <span style="background-image: url(<?php echo $icon_2; ?>);"></span>
    </a>
    <a class="icon-link" href="<?php echo get_option("Link_URL_Text_321"); ?>">
      <p><?php echo get_option("Link_Title_Text_494"); ?></p>
      <span style="background-image: url(<?php echo $icon_3; ?>);"></span>
    </a>
  </div>
</div>
