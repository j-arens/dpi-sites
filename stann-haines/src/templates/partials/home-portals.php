<?php

    $portals = [
        [
            'title' => 'Prayers',
            'image' => '/assets/images/portal-placeholder-1.jpg',
            'icon' => ['svg/heart.php'],
            'caption' => 'Request a Prayer',
            'content' => get_theme_mod('dpi_homepage_prayers_content_0017'),
            'content_fallback' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
            'btn_text' => get_theme_mod('dpi_homepage_prayers_btn_title_0018'),
            'btn_text_fallback' => 'Request a Prayer',
            'url' => get_theme_mod('dpi_homepage_prayers_btn_link_0019'),
            'url_fallback' => '/prayer-request/'
        ],
        [
            'title' => 'Get Involved',
            'image' => '/assets/images/portal-placeholder-2.jpg',
            'icon' => ['svg/plus-circle.php'],
            'caption' => 'Get Involved',
            'content' => get_theme_mod('dpi_homepage_get_involved_content_0020'),
            'content_fallback' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
            'btn_text' => get_theme_mod('dpi_homepage_get_involved_btn_title_0021'),
            'btn_text_fallback' => 'Join the Parish',
            'url' => get_theme_mod('dpi_homepage_get_involved_btn_link_0022'),
            'url_fallback' => '/register/'
        ],
        [
            'title' => 'Faith Formation',
            'image' => '/assets/images/portal-placeholder-3.jpg',
            'icon' => ['svg/bell.php'],
            'caption' => 'Faith Formation',
            'content' => get_theme_mod('dpi_homepage_faith_formation_content_0023'),
            'content_fallback' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
            'btn_text' => get_theme_mod('dpi_homepage_faith_formation_btn_title_0024'),
            'btn_text_fallback' => 'View Classes',
            'url' => get_theme_mod('dpi_homepage_faith_formation_btn_link_0025'),
            'url_fallback' => '/classes/'
        ]
    ];

?>

<section class="home-portals content-container content-container--blue container">
    <div class="row">
        <?php 
            foreach($portals as $portal) {
                echo '
                    <div class="home-portal col-xl-4">
                        <p class="home-portal-title font-light">' . $portal['title'] . '</p>
                        <a href="' . (empty($portal['url']) ? $portal['url_fallback'] : $portal['url']) . '" class="home-portal-figure--link">
                            <figure class="home-portal-figure">
                                    <span class="home-portal-figure--image" style="background-image: url(' . get_template_directory_uri() . $portal['image'] . ')"></span>
                                <figcaption class="home-portal-caption">
                                    ' . file_get_contents(locate_template($portal['icon'])) . '
                                    <p class="home-portal-caption--text font-light">' . $portal['caption'] . '</p>
                                </figcaption>
                            </figure>
                        </a>
                        <p class="home-portal-content">' . (empty($portal['content']) ? $portal['content_fallback'] : $portal['content']) . '</p>
                        <a href="' . (empty($portal['url']) ? $portal['url_fallback'] : $portal['url']) . '" class="home-portal-link font-light">' . (empty($portal['btn_text']) ? $portal['btn_text_fallback'] : $portal['btn_text']) . '</a>
                    </div>
                ';
            }
        ?>
    </div>
</section>