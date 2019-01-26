<div class="header-home">
    <div class="header-home__slider">
        <?= do_shortcode(carbon_get_the_post_meta('home_slider_shortcode')) ?>
    </div>
    <div class="header-home__overlay mw-container">
        <button id="js-menu-toggle" class="header-home__menu-toggle btn__round-toggle">
            <?= get_template_part('svg/toggle', 'hamburger') ?>
            Menu
        </button>
        <a href="<?= esc_url(home_url('/')) ?>" class="header-home__branding" style="background-image: url(<?= get_template_directory_uri() . '/assets/images/st-tims-logo-01.png' ?>)">
            <img src="<?= get_template_directory_uri() . '/assets/images/logo-subtitle.png' ?>" alt="Living the mission" class="header-home__logo-subtitle">
        </a>
        <button class="js-skip-to header-home__slide-toggle btn__round-toggle js-slide-toggle" data-anchor="skipTo-news">
            <?= get_template_part('svg/toggle', 'chevrondown') ?>
            Explore
        </button>
    </div>
</div>