<?php 

    $tabs = [
        [
            'title' => get_theme_mod('dpi_homepage_tabs_0_title_0111'),
            'title_fallback' => 'welcome',
            'content' => get_theme_mod('dpi_homepage_tabs_0_content_0112'),
            'content_fallback' => 'Aenean rhoncus id tellus quis ultrices. Curabitur fringilla congue ipsum et tristique. Quisque at libero vitae mi vulputate pellentesque. Proin et nibh libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'image' => get_theme_mod('dpi_homepage_tabs_0_img_0114'),
            'image_fallback' => get_template_directory_uri() . '/assets/images/church-placeholder-1.jpg'
        ],
        [
            'title' => get_theme_mod('dpi_homepage_tabs_1_title_0011'),
            'title_fallback' => 'Welcome',
            'content' => get_theme_mod('dpi_homepage_tabs_1_content_0012'),
            'content_fallback' => 'Aenean rhoncus id tellus quis ultrices. Curabitur fringilla congue ipsum et tristique. Quisque at libero vitae mi vulputate pellentesque. Proin et nibh libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'image' => get_theme_mod('dpi_homepage_tabs_1_img_0014'),
            'image_fallback' => get_template_directory_uri() . '/assets/images/church-placeholder-1.jpg'
        ],
        [
            'title' => get_theme_mod('dpi_homepage_tabs_2_title_0015'),
            'title_fallback' => 'Coming Soon',
            'content' => get_theme_mod('dpi_homepage_tabs_2_content_0016'),
            'content_fallback' => 'Aenean rhoncus id tellus quis ultrices. Curabitur fringilla congue ipsum et tristique. Quisque at libero vitae mi vulputate pellentesque. Proin et nibh libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'image' => get_theme_mod('dpi_homepage_tabs_2_img_0018'),
            'image_fallback' => get_template_directory_uri() . '/assets/images/church-placeholder-2.jpg'
        ],
        [
            'title' => get_theme_mod('dpi_homepage_tabs_3_title_0019'),
            'title_fallback' => 'Coming Soon',
            'content' => get_theme_mod('dpi_homepage_tabs_3_content_0020'),
            'content_fallback' => 'Aenean rhoncus id tellus quis ultrices. Curabitur fringilla congue ipsum et tristique. Quisque at libero vitae mi vulputate pellentesque. Proin et nibh libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'image' => get_theme_mod('dpi_homepage_tabs_3_img_0022'),
            'image_fallback' => get_template_directory_uri() . '/assets/images/church-placeholder-3.jpg'
        ]
    ];

    $tabNav = [
        'link_text_1' => get_theme_mod('dpi_homepage_tabs_0_link_text_0113'),
        'link_text_1_fallback' => 'welcome',
        'link_text_2' => get_theme_mod('dpi_homepage_tabs_1_link_text_0013'),
        'link_text_2_fallback' => 'Guardian Angels Church',
        'link_text_3' => get_theme_mod('dpi_homepage_tabs_2_link_text_0017'),
        'link_text_3_fallback' => 'St. Joseph Church',
        'link_text_4' => get_theme_mod('dpi_homepage_tabs_3_link_text_0021'),
        'link_text_4_fallback' => 'St. Mark of Mount Carmel Shrine'
    ]

?>

<section class="home-intro container">
    <div class="row">
        <ul id="parish-reveal" class="parish-reveal-container col-xw-10 push-xw-1 pull-xw-1 col-xs-12">
            <?php 
                $count = 1;
                foreach($tabs as $tab) {
                    echo '
                        <li class="reveal-tab container ' . ($count === 1 ? 'active' : '') . '">
                            <div class="row">
                                <article class="reveal-tab-content col-xl-6">
                                    <h1>' . (empty($tab['title']) ? $tab['title_fallback'] : $tab['title']) . '</h1>
                                    <p class="maven-pro">' . (empty($tab['content']) ? $tab['content_fallback'] : $tab['content']) . '</p>
                                    <nav class="reveal-nav">
                                        <button class="btn-slide" data-direction="left">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
                                        </button>
                                        <ul>
                                            <li class="reveal-nav-link active">' . (empty($tabNav['link_text_1']) ? $tabNav['link_text_1_fallback'] : $tabNav['link_text_1']) . '</li>
                                            <li class="reveal-nav-link">' . (empty($tabNav['link_text_2']) ? $tabNav['link_text_2_fallback'] : $tabNav['link_text_2']) . '</li>
                                            <li class="reveal-nav-link">' . (empty($tabNav['link_text_3']) ? $tabNav['link_text_3_fallback'] : $tabNav['link_text_3']) . '</li>
                                            <li class="reveal-nav-link">' . (empty($tabNav['link_text_4']) ? $tabNav['link_text_4_fallback'] : $tabNav['link_text_4']) . '</li>
                                        </ul>
                                        <button class="btn-slide" data-direction="right">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                                        </button>
                                    </nav>
                                </article>
                                <div class="reveal-tab-img col-xl-5 offset-xl-1" style="background-image: url(' . (empty($tab['image']) ? $tab['image_fallback'] : $tab['image']) . ')"></div>
                            </div>
                        </li>
                    ';
                    $count++;
                }
            ?>
        </ul>
    </div>
</section>