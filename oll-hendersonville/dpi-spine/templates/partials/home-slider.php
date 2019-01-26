<?php 

    // $bannerImage = get_field('banner_image') ?: get_template_directory_uri() . '/assets/images/virgin-mary-pic.jpg';
    // <div class="slider-placeholder" style="background-image: url(<?= $bannerImage )"></div>
?>

<section class="home-slider">
    <?= do_shortcode(get_field('home_slider_shortcode')) ?>
</section>