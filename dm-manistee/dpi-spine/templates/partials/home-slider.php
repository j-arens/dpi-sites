<section class="home-slider container">
    <div class="row">
        <?php 
            $slider = get_theme_mod('dpi_homepage_slider_shortcode_0001'); 

            if (empty($slider)) {
                $slider = '[metaslider id="9"]';
            }

            echo do_shortcode($slider);
        ?>
    </div>
</section>