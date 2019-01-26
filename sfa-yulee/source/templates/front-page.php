<?php
/**
 * Template Name: Homepage Template
 */

 $slider = get_field('homepage_slider_shortcode') ?: '[metaslider id=9]';

?>

<section class="home--section-1">
    <?= get_template_part('partials/mass-schedule') ?>
    <?php if (shortcode_exists('metaslider')) {
            echo do_shortcode($slider);
        } 
    ?>
</section>
<section class="home--section-2">
    <?= get_template_part('partials/featured-links') ?>
</section>
<section class="home--section-3">
    <div class="box-container">
        <?= get_template_part('partials/box-links') ?>
    </div>
    <div class="calendar-container">
        <div class="calendar-title-box box box__bolts">
            <p class="calendar-title-box--title">St. Francis Calendar of Events</p>
            <a href="<?= get_field('calendar_page_link') ?: '#' ?>" class="calendar-title-box--link">View All Events</a>
        </div>
        <?= do_shortcode('[calendar id="13"]') ?>
    </div>
</section>