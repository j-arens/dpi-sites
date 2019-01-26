<?php 

    $markup = '';
    $links = [
        [
            'url' => get_theme_mod('dpi_homepage_links_link_1_url_0005'),
            'url_fallback' => 'http://www.kofc.org/en/',
            'text' => get_theme_mod('dpi_homepage_links_link_1_text_0006'),
            'text_fallback' => 'Knights of Columbus'
        ],
        [
            'url' => get_theme_mod('dpi_homepage_links_link_2_url_0007'),
            'url_fallback' => 'https://www.orlandodiocese.org/',
            'text' => get_theme_mod('dpi_homepage_links_link_2_text_0008'),
            'text_fallback' => 'Diocese of Orlando'
        ],
        [
            'url' => get_theme_mod('dpi_homepage_links_link_3_url_0009'),
            'url_fallback' => 'http://w2.vatican.va/content/vatican/en.html',
            'text' => get_theme_mod('dpi_homepage_links_link_3_text_0010'),
            'text_fallback' => 'The Vatican'
        ],
        [
            'url' => get_theme_mod('dpi_homepage_links_link_4_url_0011'),
            'url_fallback' => 'https://www.ocp.org/en-us',
            'text' => get_theme_mod('dpi_homepage_links_link_4_text_0012'),
            'text_fallback' => 'Spirit & Song'
        ],
        [
            'url' => get_theme_mod('dpi_homepage_links_link_5_url_0013'),
            'url_fallback' => 'http://www.yourcatholicads.com/',
            'text' => get_theme_mod('dpi_homepage_links_link_5_text_0014'),
            'text_fallback' => 'Catholic Ads'
        ],
        [
            'url' => get_theme_mod('dpi_homepage_links_link_6_url_0015'),
            'url_fallback' => 'https://www.franciscanmedia.org/source/saint-of-the-day/',
            'text' => get_theme_mod('dpi_homepage_links_link_6_text_0016'),
            'text_fallback' => 'Saint of the Day'
        ]
    ];

    array_walk($links, function($link, $i) use (&$markup) {
        if (($i + 1) % 2 === 0) {
            $markup .= '<a href="' . (empty($link['url']) ? $link['url_fallback'] : $link['url']) . '" target="_blank" class="featured-links-item--link">' . (empty($link['text']) ? $link['text_fallback'] : $link['text']) . '</a></li>';
        } else {
            $markup .= '<li class="featured-links-item col-xs-12 col-lg-4 col-xl-3"><a href="' . (empty($link['url']) ? $link['url_fallback'] : $link['url']) . '" target="_blank" class="featured-links-item--link">' . (empty($link['text']) ? $link['text_fallback'] : $link['text']) . '</a>';
        }
    });

?>

<section class="featured-links content-container content-container--pink container">
    <ul class="row">
        <li class="featured-links-item--placard col-xs-12 col-xl-3">
            <p class="featured-links-item--placard_title font-light">
                Catholic
                <br>
                Connections
            </p>
        </li>
        <?php echo $markup; ?>
    </ul>
</section>