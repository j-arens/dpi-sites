<?php

    $bannerImage = get_field('header_banner_image') ?: get_template_directory_uri() . '/assets/images/header-banner-02-01.png';

?>

<figure class="site-header--banner">
    <img src="<?= $bannerImage ?>" alt="Church Info" class="site-header--banner-img">
</figure>