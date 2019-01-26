<?php 

    $components = [
        'home-intro',
        'home-bulletins',
        'home-news'
    ];

?>

<section class="home-main content-container content-container--blue">
    <div class="page-article">
        <?php 
            foreach($components as $component) {
                get_template_part('partials/' . $component);
            }
        ?>
    </div>
    <?php get_template_part('partials/sidebar'); ?>
</section>