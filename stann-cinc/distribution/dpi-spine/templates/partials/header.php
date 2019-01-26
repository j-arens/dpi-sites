<header class="site-header">
    <div class="site-header__container mw-container">
        <a href="<?= esc_url(home_url('/')) ?>" class="site-header__branding">
            <img src="<?= get_template_directory_uri() . '/assets/images/stann-cinc-logo.png' ?>" alt="Site Logo" class="site-header__logo">
        </a>
        <div class="site-header__links">
            <div class="site-header__links-top">
                <ul class="site-header__info">
                    <li class="site-header__info-item">
                        <?= get_template_part('svg/phone-circ') ?>
                        513-521-8440
                    </li>
                    <li class="site-header__info-item">
                        <?= get_template_part('svg/email-circ') ?>
                        info@saintannparish.org
                    </li>
                    <li class="site-header__info-item">
                        <button class="site-header__search-btn js-search-toggle">
                            <?= get_template_part('svg/search-circ') ?>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="site-header__links-bottom">
                <?= get_template_part('partials/site-nav') ?>
            </div>
        </div>
    </div>
</header>
