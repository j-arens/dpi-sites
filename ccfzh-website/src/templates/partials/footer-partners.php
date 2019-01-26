<?php

$icon_1 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_497"), 'thumbnail');

$icon_2 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_490"), 'thumbnail');

$icon_3 = wp_get_attachment_image_url( get_option("Icon_ImageUpload_396"), 'thumbnail');

?>

<div class="widget partners">
  <h3 class="widget-title">Who We Serve</h3>
  <div class="content">
    <ul>
      <li>
        <img class="icon" src="<?php echo $icon_1; ?>" />
        <a href="https://www.stfrancisholland.org/" target="_blank" ><?php echo get_option("Partner_Name_Text_357"); ?></a>
      </li>
      <li>
        <img class="icon" src="<?php echo $icon_2; ?>" />
        <a href="http://oll.org/" target="_blank"><?php echo get_option("Partner_Name_Text_298"); ?></a>
      </li>
      <li>
        <img class="icon" src="<?php echo $icon_3; ?>" />
        <a href="http://www.corpuschristischool.us/" target="_blank"><?php echo get_option("Partner_Name_Text_482"); ?></a>
      </li>
    </ul>
  </div>
</div>
