<?php

$video_img = wp_get_attachment_image_url( get_option("Featured_Image_ImageUpload_417") ,'large');

?>

<!-- featured video -->
<section class="featured-video">
  <div class="container will-animate">
    <div class="content">
      <h2><?php echo get_option("Title_Text_439"); ?></h2>
      <p><?php echo get_option("Message_TextArea_281"); ?></p>
      <a class="btn btn-primary btn-center" href="<?php echo get_option("Button_Link_Text_416"); ?>"><?php echo get_option("Button_Title_Text_331"); ?></a>
    </div>
    <div class="video" style="background-image: url(<?php echo $video_img; ?>)"></div>
  </div>
</section>
<!-- end featured video -->
