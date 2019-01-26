<?php  

    $quickLinks = carbon_get_theme_option('header_quick_links', true); 

    function getHeaderLogo() {
        $id = carbon_get_theme_option('header_logo');

        if (!$id) {
            return get_template_directory_uri() . '/assets/images/all-saints-logo-header-01.png';
        }

        return wp_get_attachment_image_src($id, 'full')[0];
    }

?>

<header class="site-header">
    <div class="mw-container-lg site-header__container">
        <div class="site-header__half">
            <a href="<?= esc_url(home_url('/')) ?>" class="site-header__branding">
                <img src="<?= getHeaderLogo() ?>" alt="All Saints Church Logo" class="site-header__logo">
            </a>
        </div>
        <div class="site-header__half">
            <?php if (!empty($quickLinks)): ?>
                <ul class="site-header__quick-links">
                    <?php foreach($quickLinks as $link): ?>
                        <li class="site-header__quick-link-item">
                            <a 
                                href="<?= esc_url($link['link_url']) ?>" 
                                <?= $link['open_in_new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                                class="site-header__quick-link">
                                    <?= $link['link_title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="site-header__search-container">
                <?= get_search_form() ?>
            </div>
        </div>
    </div>
    <div class="site-header__nav-container">
        <?= get_template_part('partials/site-nav') ?>
        <?= do_shortcode('[dpi_mm menu="primary_navigation"]') ?>
    </div>
</header>
