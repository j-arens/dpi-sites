<?php
class DPI_Customizer {

    private $manager;
    private $localize = [];
    private $customizer = [
        'panels' => [   // panels --*
            [
                'id' => 'dpi_homepage_0001',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Homepage'
                ]
            ],
            [
                'id' => 'dpi_footer_0002',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Footer'
                ]
            ]
        ],
        'sections' => [    // sections --*
            [
                'id' => 'dpi_homepage_slider_0001',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Slider',
                    'panel' => 'dpi_homepage_0001',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_0002',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Featured Links',
                    'panel' => 'dpi_homepage_0001',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0003',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Tabs',
                    'panel' => 'dpi_homepage_0001',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_0004',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Mass Times',
                    'panel' => 'dpi_homepage_0001',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_0005',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Contact Info',
                    'panel' => 'dpi_footer_0002'
                ]
            ]
        ],
        'settings' => [    // settings --*
            [
                'id' => 'dpi_homepage_slider_shortcode_0001',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '[metaslider id=9]'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_icon_0002',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-featured-links .featured-link:first-of-type .featured-link-icon'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_text_0003',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Get Involved',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-featured-links .featured-link:first-of-type p'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_href_0004',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '#'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_icon_0005',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-featured-links .featured-link:nth-of-type(2) .featured-link-icon'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_text_0006',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Online Giving',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-featured-links .featured-link:nth-of-type(2) p'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_href_0007',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '#'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_icon_0008',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-featured-links .featured-link:last-of-type .featured-link-icon'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_text_0009',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Bulletins',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-featured-links .featured-link:last-of-type p'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_href_0010',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '#'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_title_0111',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Welcome',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:first-of-type h1'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_content_0112',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:first-of-type p'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_link_text_0113',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Welcome',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-nav li:first-of-type'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_img_0114',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-intro .reveal-tab:first-of-type .reveal-tab-img'
                ]
            ],
            [ // break
                'id' => 'dpi_homepage_tabs_1_title_0011',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Coming Soon',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(2) h1'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_content_0012',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(2) p'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_link_text_0013',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Guardian Angels Church',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-nav li:nth-of-type(2)'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_img_0014',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(2) .reveal-tab-img'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_title_0015',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Dummy Content',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(3) h1'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_content_0016',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(3) p'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_link_text_0017',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'St. Joseph Church',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-nav li:nth-of-type(3)'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_img_0018',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-intro .reveal-tab:nth-of-type(3) .reveal-tab-img'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_title_0019',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Dummy Content',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:last-of-type h1'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_content_0020',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-tab:last-of-type p'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_link_text_0021',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'St. Mark of Mount Carmel Shrine',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro .reveal-nav li:last-of-type'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_img_0022',
                'method' => 'add_setting',
                'settings' => [
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'background_image',
                    'selector' => '.home-intro .reveal-tab:last-of-type .reveal-tab-img'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_button_text_0023',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'View Mass Schedule',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:first-of-type a'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_button_link_0024',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '#'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_tite_0025',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Saturday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(2) .mass-day'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_time_1_0026',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '4:00 and',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(2) p:nth-child(2)'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_time_2_0027',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '6:00 pm',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(2) p:last-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_title_0028',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Sunday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(3) .mass-day'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_time_1_0029',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '7:30, 9:30, and',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(3) p:nth-child(2)'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_time_2_0030',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '11:30 am',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:nth-of-type(3) p:last-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_title_0031',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Extraordinary Form',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:last-of-type .mass-day'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_time_1_0032',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '3:00 pm',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:last-of-type p:nth-child(2)'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_time_2_0033',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-mass-times .mass-time-slot:last-of-type p:last-child'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_1_title_0034',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Parish Office',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer .footer-parish:first-of-type .footer-parish-name'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_1_address_0035',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '254 Sixth Street, Manistee, MI 49660',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer .footer-parish:first-of-type .footer-parish-address'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_2_title_0036',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'St. Joseph Church',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer .footer-parish:last-of-type .footer-parish-name'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_2_address_0037',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '249 Sixth Street, Manistee, MI 49660',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer .footer-parish:last-of-type .footer-parish-address'
                ]
            ],
        ],
        'controls' => [    // controls --*
            [
                'id' => 'dpi_homepage_slider_shortcode_control_0001',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slider Shortcode',
                    'type' => 'text',
                    'section' => 'dpi_homepage_slider_0001',
                    'settings' => 'dpi_homepage_slider_shortcode_0001'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_icon_control_0002',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 1 Icon',
                    'type' => 'image',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_1_icon_0002'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_text_control_0003',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 1 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_1_text_0003'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_1_href_control_0004',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 1 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_1_href_0004'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_icon_control_0005',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 2 Icon',
                    'type' => 'image',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_2_icon_0005'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_text_control_0006',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 2 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_2_text_0006'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_2_href_control_0007',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 2 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_2_href_0007'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_icon_control_0008',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 3 Icon',
                    'type' => 'image',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_3_icon_0008'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_text_control_0009',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 3 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_3_text_0009'
                ]
            ],
            [
                'id' => 'dpi_homepage_featured_links_3_href_control_0010',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Featured Link 3 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_featured_links_0002',
                    'settings' => 'dpi_homepage_featured_links_3_href_0010'
                ]
            ],
            [ // break
                'id' => 'dpi_homepage_tabs_0_title_control_0111',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 1 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_0_title_0111'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_content_control_0112',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 1 Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_0_content_0112'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_link_text_control_0113',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 1 Link Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_0_link_text_0113'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_0_img_control_0114',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 1 Picture',
                    'type' => 'image',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_0_img_0114'
                ]
            ],
            [ // break
                'id' => 'dpi_homepage_tabs_1_title_control_0011',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 2 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_1_title_0011'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_content_control_0012',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 2 Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_1_content_0012'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_link_text_control_0013',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 2 Link Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_1_link_text_0013'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_1_img_control_0014',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 2 Picture',
                    'type' => 'image',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_1_img_0014'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_title_control_0015',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 3 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_2_title_0015'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_content_control_0016',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 3 Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_2_content_0016'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_link_text_control_0017',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 3 Link Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_2_link_text_0017'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_2_img_control_0018',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 3 Picture',
                    'type' => 'image',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_2_img_0018'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_title_control_0019',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 4 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_3_title_0019'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_content_control_0020',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 4 Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_3_content_0020'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_link_text_control_0021',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 4 Link Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_3_link_text_0021'
                ]
            ],
            [
                'id' => 'dpi_homepage_tabs_3_img_control_0022',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Tab 4 Picture',
                    'type' => 'image',
                    'section' => 'dpi_homepage_tabs_0003',
                    'settings' => 'dpi_homepage_tabs_3_img_0022'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_button_tex_control_0023',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_button_text_0023'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_button_link_control_0024',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Link',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_button_link_0024'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_tite_control_0025',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 1 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_1_tite_0025'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_time_1_control_0026',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 1 Time 1',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_1_time_1_0026'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_1_time_2_control_0027',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 1 Time 2',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_1_time_2_0027'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_title_control_0028',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 2 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_2_title_0028'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_time_1_control_0029',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 2 Time 1',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_2_time_1_0029'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_2_time_2_control_0030',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 2 Time 2',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_2_time_2_0030'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_title_control_0031',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 3 Title',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_3_title_0031'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_time_1_control_0032',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 3 Time 1',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_3_time_1_0032'
                ]
            ],
            [
                'id' => 'dpi_homepage_mass_times_slot_3_time_2_control_0033',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Time Slot 3 Time 2',
                    'type' => 'text',
                    'section' => 'dpi_homepage_mass_times_0004',
                    'settings' => 'dpi_homepage_mass_times_slot_3_time_2_0033'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_1_title_control_0034',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Contact 1 Name',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_0005',
                    'settings' => 'dpi_footer_contact_1_title_0034'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_1_address_control_0035',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Contact 1 Address',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_0005',
                    'settings' => 'dpi_footer_contact_1_address_0035'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_2_title_control_0036',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Contact 2 Name',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_0005',
                    'settings' => 'dpi_footer_contact_2_title_0036'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_2_address_control_0037',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Contact 2 Address',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_0005',
                    'settings' => 'dpi_footer_contact_2_address_0037'
                ]
            ],
        ]
    ];

    public function __construct() {
        add_action('customize_register', [$this, 'init']);
        add_action('customize_preview_init', [$this, 'customizerJs']);
    }

    public function init($wp_customize) {
        $this->manager = $wp_customize;
        $this->recursiveRegister($this->customizer);
        $this->removeDefaults();
    }

    public function recursiveRegister($arr) {
        $iterator = new RecursiveArrayIterator($arr);

        while ($iterator->valid()) {
            if ($iterator->hasChildren()) {
                foreach($iterator->getChildren() as $k => $component) {
                    $this->addComponent($component);
                }
            }
            $iterator->next();
        }
    }

    public function addComponent($component) {
        $type = array_key_exists('type', $component['settings']) ? $component['settings']['type'] : '';
        $selectiveRefresh = array_key_exists('selective_refresh', $component);
        $jsRefresh = array_key_exists('js_refresh', $component);

        if ($selectiveRefresh) {
            $this->addPartial($component);
        } else if ($jsRefresh) {
            $component['js_refresh']['id'] = $component['id'];
            array_push($this->localize, $component['js_refresh']);
        }

        switch ($type) {
            case 'color':
                $this->manager->add_control(
                    new WP_Customize_Color_Control(
                        $this->manager,
                        $component['id'],
                        $component['settings']
                    )
                );
                break;
            case 'image':
                $this->manager->add_control(
                    new WP_Customize_Image_Control(
                        $this->manager,
                        $component['id'],
                        $component['settings']
                    )
                );
                break;
            case 'image_crop':
                $this->manager->add_control(
                    new WP_Customize_Cropped_Image_Control(
                        $this->manager,
                        $component['id'],
                        $component['settings']
                    )
                );
                break;
            case 'file':
                $this->manager->add_control(
                    new WP_Customize_Media_Control(
                        $this->manager,
                        $component['id'],
                        $component['settings']
                    )
                );
                break;
            case 'custom':
                $this->manager->add_control(
                    new WP_Customize_Control(
                        $this->manager,
                        $component['id'],
                        $component['settings']
                    )
                );
                break;
            default:
                call_user_func_array(
                    [$this->manager, $component['method']],
                    [$component['id'], $component['settings']]
                );
                break;
        }
    }

    public function addPartial($component) {
        $id = $component['id'];
        $component['selective_refresh']['settings'] = $id;
        $component['selective_refresh']['render_callback'] = function() use ($id) {
            return get_theme_mod($id);
        };
        $this->manager->selective_refresh->add_partial($id, $component['selective_refresh']);
    }

    public function customizerJs() {
        wp_register_script('dpi-customizer-js', asset_path('scripts/js/customizer.js'), ['jquery', 'customize-preview'], '1.0.0', true);
        wp_localize_script('dpi-customizer-js', 'dpi_cust_local', json_encode($this->localize));
        wp_enqueue_script('dpi-customizer-js');
    }

    public function removeDefaults() {
        $defaultSections = [
            'colors',
            'header_image',
            'background_image',
            'static_front_page',
            'custom_css',
            'themes'
        ];

        foreach($defaultSections as $section) {
            $this->manager->remove_section($section);
        }

        // can't remove menu or widget panels with remove_panel(), thanks wordpress...
        remove_action( 'customize_controls_enqueue_scripts', [$this->manager->nav_menus, 'enqueue_scripts'] );
        remove_action( 'customize_register', [$this->manager->nav_menus, 'customize_register'], 11 );
        remove_filter( 'customize_dynamic_setting_args', [$this->manager->nav_menus, 'filter_dynamic_setting_args'] );
        remove_filter( 'customize_dynamic_setting_class', [$this->manager->nav_menus, 'filter_dynamic_setting_class'] );
        remove_action( 'customize_controls_print_footer_scripts', [$this->manager->nav_menus, 'print_templates'] );
        remove_action( 'customize_controls_print_footer_scripts', [$this->manager->nav_menus, 'available_items_template'] );
        remove_action( 'customize_preview_init', [$this->manager->nav_menus, 'customize_preview_init'] );
        remove_action( 'customize_controls_enqueue_scripts', [$this->manager->widgets, 'enqueue_scripts'] );
        remove_action( 'customize_register', [$this->manager->widgets, 'customize_register'], 11 );
        remove_filter( 'customize_dynamic_setting_args', [$this->manager->widgets, 'filter_dynamic_setting_args'] );
        remove_filter( 'customize_dynamic_setting_class', [$this->manager->widgets, 'filter_dynamic_setting_class'] );
        remove_action( 'customize_controls_print_footer_scripts', [$this->manager->widgets, 'print_templates'] );
        remove_action( 'customize_controls_print_footer_scripts', [$this->manager->widgets, 'available_items_template'] );
        remove_action( 'customize_preview_init', [$this->manager->widgets, 'customize_preview_init'] );
    }

}

new DPI_Customizer();