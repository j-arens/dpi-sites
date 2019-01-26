<?php 

    $shortcode = get_theme_mod('dpi_homepage_slider_shortcode_0003');
    $shortcode_fallback = '[metaslider id=92]';

?>

<section class="home-slider">
    <?php 
        if (empty($shortcode)) {
            echo do_shortcode($shortcode_fallback);
        } else {
            echo do_shortcode($shortcode);
        }
    ?>
</section>