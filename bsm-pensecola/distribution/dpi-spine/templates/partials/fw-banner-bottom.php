<?php 

    function getBannerBottomBg() {
        $bg = carbon_get_the_post_meta('home_banner_2_img');

        if (empty($bg)) {
            return get_template_directory_uri() . '/assets/images/fw-banner-1.jpg';
        }

        return wp_get_attachment_image_src($bg, 'full')[0];
    }

?>

<section class="fw-banner" style="background-image: url(<?= getBannerBottomBg() ?>)"></section>