<?php

    $sliderShortcode = empty(get_field('slider_shortcode')) ? '[metaslider id=129]' : get_field('slider_shortcode');

?>

<section class="slider">
    <?=do_shortcode($sliderShortcode)?>
</section>