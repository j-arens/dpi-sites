<?php 

    $content = get_theme_mod('dpi_homepage_intro_content_0004');
    $content_fallback = '<em class="font-black-italic">Lorem ipsum dolor sit</em> amet, consectetur adipiscing elit. Sed in dignissim turpis. Vestibulum consequat ipsum ex, quis egestas tellus varius vel. Ut ac eros venenatis, egestas sapien sed, viverra quam. Proin laoreet mollis odio at laoreet. Integer lacinia pharetra lorem, vulputate mollis lectus cursus sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras rhoncus odio id risus dictum suscipit.';

?>

<div class="home-main-container home-intro">
    <header class="home-intro-header">
        <h1 class="home-intro-header--title font-light">Welcome</h1>
        <a class="home-intro-header--link font-light" href="<?php echo esc_url('/pastors-notes'); ?>">Pastor's Notes</a>
    </header>
    <p class="home-intro-content">
         <?php 
            if (empty($content)) {
                echo $content_fallback;
            } else {
                echo $content;
            }
         ?>
    </p>
</div>