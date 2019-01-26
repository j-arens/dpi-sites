<?php

    $buttons = [
        [
            'icon' => get_theme_mod('dpi_homepage_featured_links_1_icon_0002'),
            'icon_fallback' => get_template_directory_uri() . '/assets/icons/church.svg',
            'text' => get_theme_mod('dpi_homepage_featured_links_1_text_0003'),
            'text_fallback' => 'Get Involved',
            'href' => get_theme_mod('dpi_homepage_featured_links_1_href_0004'),
            'href_fallback' => '/outreach/'
        ],
        [
            'icon' => get_theme_mod('dpi_homepage_featured_links_2_icon_0005'),
            'icon_fallback' => get_template_directory_uri() . '/assets/icons/money.svg',
            'text' => get_theme_mod('dpi_homepage_featured_links_2_text_0006'),
            'text_fallback' => 'Online Giving',
            'href' => get_theme_mod('dpi_homepage_featured_links_2_href_0007'),
            'href_fallback' => 'https://www.osvonlinegiving.com/4209',
            'target' => '_blank'
        ],
        [
            'icon' => get_theme_mod('dpi_homepage_featured_links_3_icon_0008'),
            'icon_fallback' => get_template_directory_uri() . '/assets/icons/bulletin.svg',
            'text' => get_theme_mod('dpi_homepage_featured_links_3_text_0009'),
            'text_fallback' => 'Bulletins',
            'href' => get_theme_mod('dpi_homepage_featured_links_3_href_0010'),
            'href_fallback' => '/bulletins/'
        ]
    ];

?>

<section class="home-featured-links container">
    <div class="row">
        <?php
            foreach($buttons as $button) {
                echo '
                    <a 
                        class="featured-link slide-bg col-lg-4 col-xs-12"
                        ' . (array_key_exists('target', $button) ? "target=\"" . $button['target'] . "\"" : "") . '
                        href="' . (empty($button['href']) ? $button['href_fallback'] : $button['href']) . '">
                        <span 
                            class="featured-link-icon" 
                            style="background-image: url(' . (empty($button['icon']) ? $button['icon_fallback'] : $button['icon']) . ')">
                        </span>
                        <p>' . (empty($button['text']) ? $button['text_fallback'] : $button['text']) . '</p>
                    </a>
                ';
            }
        ?>
    </div>
</section>