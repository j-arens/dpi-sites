<div class="header-home__info-bar">
    <div class="header-home__info-container mw-container">
        <a href="tel:<?= carbon_get_theme_option('phone_number') ?>" class="header-home__info-link">
            <?= get_template_part('svg/phone') ?>
            <p class="header-home__info-phone-number"><?= carbon_get_theme_option('phone_number') ?></p>
        </a>
        <a href="<?= carbon_get_theme_option('facebook_page_link') ?>" class="header-home__info-link" target="_blank" rel="noopener">
            <?= get_template_part('svg/facebook') ?>
        </a>
        <a href="//myparishapp.net" class="header-home__info-link" target="_blank" rel="noopener">
            <?= get_template_part('svg/mpa') ?>
        </a>
        <button class="header-home__search-toggle js-search-toggle">
            <?= get_template_part('svg/search') ?>
        </button>
    </div>
</div>
<div class="header-home__menu-container mw-container">
    <a 
        href="<?= esc_url(home_url()) ?>" 
        class="header-home__logo" 
        style="background-image: url(<?= wp_get_attachment_image_src(carbon_get_theme_option('header_logo'), 'full')[0] ?>)">
    </a>
    <?= get_template_part('partials/site-nav') ?>
    <?= get_template_part('partials/mobile-nav') ?>
</div>