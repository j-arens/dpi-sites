<?php

class DPI_Customizer {

    private $manager;
    private $localize = [];
    private $customizer = [
        'panels' => [   // panels --*
            [
                'id' => 'dpi_header_0001',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Header'
                ]
            ],
            [
                'id' => 'dpi_homepage_0002',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Homepage'
                ]
            ],
            [
                'id' => 'dpi_sidebar_0003',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Sidebar'
                ]
            ],
            [
                'id' => 'dpi_footer_0004',
                'method' => 'add_panel',
                'settings' => [
                    'title' => 'Footer'
                ]
            ]
        ],
        'sections' => [    // sections --*
            [
                'id' => 'dpi_header_contact_0001',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Contact Info',
                    'panel' => 'dpi_header_0001'
                ]
            ],
            [
                'id' => 'dpi_homepage_slider_0002',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Slider',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_intro_0003',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Introduction',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_0004',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Featured Links',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_0005',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Prayers',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_0006',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Get Involved',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_0007',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Faith Formation',
                    'panel' => 'dpi_homepage_0002',
                    'active_callback' => 'is_front_page'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_0008',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Mass Times',
                    'panel' => 'dpi_sidebar_0003'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_0009',
                'method' => 'add_section',
                'settings' => [
                    'title' => 'Contact Info',
                    'panel' => 'dpi_footer_0004'
                ]
            ]
        ],
        'settings' => [    // settings --*
            [
                'id' => 'dpi_header_contact_phone_0001',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '(863) 422-4370',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.topbar-parish-info--item:first-of-type .topbar-parish-info--link'
                ]
            ],
            [
                'id' => 'dpi_header_contact_address_0002',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '1311 Robinson Dr, Haines City, FL 33845',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.topbar-parish-info--item:nth-of-type(2) .topbar-parish-info--link'
                ]
            ],
            [
                'id' => 'dpi_homepage_slider_shortcode_0003',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '[metaslider id=92]'
                ]
            ],
            [
                'id' => 'dpi_homepage_intro_content_0004',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in dignissim turpis. Vestibulum consequat ipsum ex, quis egestas tellus varius vel. Ut ac eros venenatis, egestas sapien sed, viverra quam. Proin laoreet mollis odio at laoreet. Integer lacinia pharetra lorem, vulputate mollis lectus cursus sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras rhoncus odio id risus dictum suscipit. Quisque porta sapien id lorem efficitur, et consequat augue auctor. Cras hendrerit, risus eget facilisis tempus, erat metus sagittis sapien, et faucibus orci metus non felis. Nam ultricies orci neque, gravida porttitor massa consequat vel. Mauris massa dolor, tincidunt ut porttitor et, dignissim nec risus. Integer venenatis mi id est rutrum, et posuere felis interdum.',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-intro-content'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_1_url_0005',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'http://www.kofc.org/en/'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_1_text_0006',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Knights of Columbus',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:nth-of-type(2) a:first-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_2_url_0007',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'https://www.orlandodiocese.org/'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_2_text_0008',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Diocese of Orlando',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:nth-of-type(2) a:last-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_3_url_0009',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'http://w2.vatican.va/content/vatican/en.html'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_3_text_0010',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'The Vatican',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:nth-of-type(3) a:first-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_4_url_0011',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'https://www.ocp.org/en-us'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_4_text_0012',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Spirit & Song',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:nth-of-type(3) a:last-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_5_url_0013',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'http://www.yourcatholicads.com/'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_5_text_0014',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Catholic Ads',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:last-of-type a:first-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_6_url_0015',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'https://www.franciscanmedia.org/source/saint-of-the-day/'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_6_text_0016',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Saint of the Day',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.featured-links ul li:last-of-type a:last-child'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_content_0017',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:first-of-type .home-portal-content'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_btn_title_0018',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Request a Prayer',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:first-of-type .home-portal-link'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_btn_link_0019',
                'method' => 'add_setting',
                'settings' => [
                    'default' => ''
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_content_0020',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:nth-of-type(2) .home-portal-content'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_btn_title_0021',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Join the Parish',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:nth-of-type(2) .home-portal-link'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_btn_link_0022',
                'method' => 'add_setting',
                'settings' => [
                    'default' => ''
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_content_0023',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Dolor sit amet, consectetur adipiscing elit. Etiam non commodo libero. Nunc purus nisl, condimentum hendrerit porttitor non, vestibulum nec diam.',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:last-of-type .home-portal-content'
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_btn_title_0024',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'View Classes',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.home-portals .home-portal:last-of-type .home-portal-link'
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_btn_link_0025',
                'method' => 'add_setting',
                'settings' => [
                    'default' => ''
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_1_day_0026',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Saturday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:first-of-type .sidebar-mass-times--item_day'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_1_times_0027',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '9:00 am, 4:00 pm - Vigil',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:first-of-type .sidebar-mass-times--item_time'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_2_day_0028',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Sunday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:nth-of-type(2) .sidebar-mass-times--item_day'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_2_times_0029',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '7:30, 10:00 am, 12:00 and 7:00 pm (spanish)',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:nth-of-type(2) .sidebar-mass-times--item_time'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_3_day_0030',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Monday - Thursday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:nth-of-type(3) .sidebar-mass-times--item_day'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_3_times_0031',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '9:00 am',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:nth-of-type(3) .sidebar-mass-times--item_time'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_4_day_0031',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'Friday',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:last-of-type .sidebar-mass-times--item_day'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_4_times_0032',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '7:00 am (spanish) - First Friday of the month, Benediction 6:45 pm, Mass at 7:00, 9:00 am',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.sidebar-mass-times li:last-of-type .sidebar-mass-times--item_time'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_address_0033',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '1311 Robinson Dr, Haines City, FL 33845',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer-contact li:first-of-type .site-footer-contact--item_content'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_phone_0034',
                'method' => 'add_setting',
                'settings' => [
                    'default' => '(863) 422-4370',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer-contact li:nth-of-type(2) .site-footer-contact--item_content'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_email_0035',
                'method' => 'add_setting',
                'settings' => [
                    'default' => 'luz@stannhc.org',
                    'transport' => 'postMessage'
                ],
                'js_refresh' => [
                    'type' => 'text',
                    'selector' => '.site-footer-contact li:last-of-type .site-footer-contact--item_content'
                ]
            ]
        ],
        'controls' => [    // controls --*
            [
                'id' => 'dpi_header_contact_phone_control_0001',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Phone Number',
                    'type' => 'text',
                    'section' => 'dpi_header_contact_0001',
                    'settings' => 'dpi_header_contact_phone_0001'
                ]
            ],
            [
                'id' => 'dpi_header_contact_address_control_0002',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Address',
                    'type' => 'text',
                    'section' => 'dpi_header_contact_0001',
                    'settings' => 'dpi_header_contact_address_0002'
                ]
            ],
            [
                'id' => 'dpi_homepage_slider_shortcode_control_0003',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slider Shortcode',
                    'type' => 'text',
                    'section' => 'dpi_homepage_slider_0002',
                    'settings' => 'dpi_homepage_slider_shortcode_0003'
                ]
            ],
            [
                'id' => 'dpi_homepage_intro_content_control_0004',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Intro Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_intro_0003',
                    'settings' => 'dpi_homepage_intro_content_0004'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_1_url_control_0005',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 1 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_1_url_0005'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_1_text_control_0006',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 1 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_1_text_0006'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_2_url_control_0007',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 2 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_2_url_0007'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_2_text_control_0008',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 2 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_2_text_0008'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_3_url_control_0009',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 3 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_3_url_0009'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_3_text_control_0010',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 3 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_3_text_0010'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_4_url_control_0011',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 4 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_4_url_0011'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_4_text_control_0012',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 4 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_4_text_0012'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_5_url_control_0013',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 5 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_5_url_0013'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_5_text_control_0014',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 5 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_5_text_0014'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_6_url_control_0015',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 6 URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_6_url_0015'
                ]
            ],
            [
                'id' => 'dpi_homepage_links_link_6_text_control_0016',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Link 6 Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_links_0004',
                    'settings' => 'dpi_homepage_links_link_6_text_0016'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_content_control_0017',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_prayers_0005',
                    'settings' => 'dpi_homepage_prayers_content_0017'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_btn_title_control_0018',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_prayers_0005',
                    'settings' => 'dpi_homepage_prayers_btn_title_0018'
                ]
            ],
            [
                'id' => 'dpi_homepage_prayers_btn_link_control_0019',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Link URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_prayers_0005',
                    'settings' => 'dpi_homepage_prayers_btn_link_0019'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_content_control_0020',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_get_involved_0006',
                    'settings' => 'dpi_homepage_get_involved_content_0020'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_btn_title_control_0021',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_get_involved_0006',
                    'settings' => 'dpi_homepage_get_involved_btn_title_0021'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_btn_link_control_0022',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Link URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_get_involved_0006',
                    'settings' => 'dpi_homepage_get_involved_btn_link_0022'
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_content_control_0023',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Content',
                    'type' => 'textarea',
                    'section' => 'dpi_homepage_faith_formation_0007',
                    'settings' => 'dpi_homepage_faith_formation_content_0023'
                ]
            ],
            [
                'id' => 'dpi_homepage_faith_formation_btn_title_control_0024',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Text',
                    'type' => 'text',
                    'section' => 'dpi_homepage_faith_formation_0007',
                    'settings' => 'dpi_homepage_faith_formation_btn_title_0024'
                ]
            ],
            [
                'id' => 'dpi_homepage_get_involved_btn_link_control_0024',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Button Link URL',
                    'type' => 'text',
                    'section' => 'dpi_homepage_faith_formation_0007',
                    'settings' => 'dpi_homepage_faith_formation_btn_link_0025'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_1_day_control_0026',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 1 Day',
                    'type' => 'text',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_1_day_0026'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_1_times_control_0027',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 1 Times',
                    'type' => 'textarea',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_1_times_0027'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_2_day_control_0028',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 2 Day',
                    'type' => 'text',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_2_day_0028'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_2_times_control_0029',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 2 Times',
                    'type' => 'textarea',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_2_times_0029'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_3_day_control_0030',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 3 Day',
                    'type' => 'text',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_3_day_0030'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_3_times_control_0031',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 3 Times',
                    'type' => 'textarea',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_3_times_0031'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_4_day_control_0031',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 4 Day',
                    'type' => 'text',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_4_day_0031'
                ]
            ],
            [
                'id' => 'dpi_sidebar_mass_times_4_times_control_0032',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Slot 4 Times',
                    'type' => 'textarea',
                    'section' => 'dpi_sidebar_mass_times_0008',
                    'settings' => 'dpi_sidebar_mass_times_4_times_0032'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_address_control_0033',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Address',
                    'type' => 'textarea',
                    'section' => 'dpi_footer_contact_info_0009',
                    'settings' => 'dpi_footer_contact_info_address_0033'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_phone_control_0034',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Phone Number',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_info_0009',
                    'settings' => 'dpi_footer_contact_info_phone_0034'
                ]
            ],
            [
                'id' => 'dpi_footer_contact_info_email_control_0035',
                'method' => 'add_control',
                'settings' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'section' => 'dpi_footer_contact_info_0009',
                    'settings' => 'dpi_footer_contact_info_email_0035'
                ]
            ]
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