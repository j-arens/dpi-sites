<header id="skipTo-header" class="site-header <?= is_front_page() ? '' : 'site-header__inner-page' ?>">
    <div class="site-header__quicklinks-container">
        <ul class="site-header__quicklinks mw-container">
            <li class="site-header__quicklink-item">
                <a href="https://www.google.com/maps/dir//St.+Timothy+Catholic+Church,+17512+Lakeshore+Rd,+Lutz,+FL+33558/@28.1250866,-82.5382276,17z/data=!4m15!1m6!3m5!1s0x88c2bfbea52deef3:0x5de5e46e807e993f!2sSt.+Timothy+Catholic+Church!8m2!3d28.1250866!4d-82.5360389!4m7!1m0!1m5!1m1!1s0x88c2bfbea52deef3:0x5de5e46e807e993f!2m2!1d-82.5360389!2d28.1250866" 
                class="site-header__quicklink" target="_blank" rel="noopener">
                    <?= get_template_part('svg/marker-pin') ?>
                    <?= carbon_get_theme_option('street') ?> | 
                    <?= carbon_get_theme_option('city') ?>
                    <?= carbon_get_theme_option('state') ?>
                    <?= carbon_get_theme_option('zip_code') ?>
                </a>
            </li>
            <li class="site-header__quicklink-item">
                <a href="tel:8139681077" class="site-header__quicklink">
                    <?= get_template_part('svg/phone') ?>
                    <?= carbon_get_theme_option('phone_number') ?>
                </a>
            </li>
            <li class="site-header__quicklink-item">
                <a href="/our-app/" class="site-header__quicklink">
                    <?= get_template_part('svg/mpa') ?> 
                    Our App
                </a>
            </li>
            <li class="site-header__quicklink-item">
                <a href="<?= carbon_get_theme_option('facebook_url') ?>" target="_blank" rel="noopener" class="site-header__quicklink">
                    <?= get_template_part('svg/facebook', 'circ') ?>
                </a>
                <a href="<?= carbon_get_theme_option('twitter_url') ?>" target="_blank" rel="noopener" class="site-header__quicklink">
                    <?= get_template_part('svg/twitter', 'circ') ?>
                </a>
                <a href="#" class="site-header__quicklink js-search-toggle">
                    <?= get_template_part('svg/search', 'circ') ?>
                </a>
            </li>
        </ul>
    </div>
    <?= is_front_page() ? get_template_part('partials/header', 'home') : '' ?>
</header>
