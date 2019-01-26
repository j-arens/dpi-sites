<section class="home-events">
    <div class="mw-container">
        <p class="home-events__title">What's Happening</p>
        <div class="home-events__slider-container">
            <?= do_shortcode(carbon_get_post_meta(get_the_ID(), 'events_slider_shortcode')) ?>
        </div>
    </div>
</section>