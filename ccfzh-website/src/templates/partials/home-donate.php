<?php

$bg_image = wp_get_attachment_image_url( get_option("Background_Image_ImageUpload_271") , [1920, 500] );

?>

<!-- donate section -->
<section class="donate" style="background-image: url(<?php echo $bg_image; ?>)">
  <div class="container">
    <div class="content will-animate">
      <p><?php echo  get_option("Message_TextArea_288"); ?></p>
      <a class="btn btn-primary" href="<?php echo get_option("Button_Link_Text_506"); ?>" target="_blank"><?php echo get_option("Button_Title_Text_425"); ?></a>
    </div>
  </div>
</section>
<!-- end donate section -->
