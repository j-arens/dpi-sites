<?php

class DPI_Customizer {

  private $manager;
  private $localize = [];
  private $customizer = [
    'panels' => [
      [
        'id' => 'dpi_homepage_0001',
        'method' => 'add_panel',
        'settings' => [
          'title' => 'Homepage'
        ]
      ],
      [
        'id' => 'dpi_contact_page_0002',
        'method' => 'add_panel',
        'settings' => [
          'title' => 'Contact Page'
        ]
      ],
      [
        'id' => 'dpi_footer_0003',
        'method' => 'add_panel',
        'settings' => [
          'title' => 'Site Footer'
        ]
      ]
    ],
    'sections' => [
      [
        'id' => 'dpi_homepage_mass_times_0001',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Mass Times',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_welcome_0002',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Welcome',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_0003',
        'method' => 'add_section',
        'settings' => [
          'title' => 'New to St. Marks',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_0004',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Want to Help The Commmunity?',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_icon_boxes_0005',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Icon Boxes',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_homepage_quote_0006',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Featured Quote',
          'panel' => 'dpi_homepage_0001',
          'active_callback' => 'is_front_page'
        ]
      ],
      [
        'id' => 'dpi_footer_info_0007',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Footer Info',
          'panel' => 'dpi_footer_0003'
        ]
      ],
      [
        'id' => 'dpi_contact_info_0008',
        'method' => 'add_section',
        'settings' => [
          'title' => 'Contact Info',
          'panel' => 'dpi_contact_page_0002',
          'active_callback' => ''
        ]
      ]
    ],
    'settings' => [
      [
        'id' => 'dpi_homepage_mass_time_1_0001',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Sat: 4:00 pm',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.mass-times-featured li:nth-of-type(2)'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_2_0002',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Sun: 9:00 & 11:00 am',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.mass-times-featured li:nth-of-type(3)'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_3_0003',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Holy Day: 8:30 am',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.mass-times-featured li:nth-of-type(4)'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_4_0004',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Weekdays: 8:30 am',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.mass-times-featured li:nth-of-type(5)'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_view_more_link_0005',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/mass-times/'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_directions_link_0006',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/mass-times/'
        ]
      ],
      [
        'id' => 'dpi_homepage_welcome_message_0007',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Thank you for coming to St. Mark Parish of Cleveland, OH. St. Mark is a Christian community committed to Spiritual growth through the Word of God, the Bread of Life, and the guidance of the Holy Spirit. We are dedicated to celebrating the Eucharist and to the continued development of our historically strong Christian education and outreach.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.welcome-row p'
        ]
      ],
      [
        'id' => 'dpi_homepage_welcome_video_0008',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_message_0009',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Join us for mass and other events here at St. Mark Parish.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.new-row p'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_link_0010',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/news-events/'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_img_0011',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.new-row .featured-image'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_message_0012',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Learn more about volunteer opportunities with church and community.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.community-row p'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_link_0013',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/helping-others/',
        ]
      ],
      [
        'id' => 'dpi_homepage_community_img_0014',
        'method' => 'add_setting',
        'settings' => [
          'default' => '',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'background_image',
          'selector' => '.community-row .featured-image'
        ]
      ],
      [
        'id' => 'dpi_homepage_upcoming_message_0015',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Stay up-to-date by following our calendar and joining our mailing list.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.upcoming-events p'
        ]
      ],
      [
        'id' => 'dpi_homepage_upcoming_link_0016',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/news-events/'
        ]
      ],
      [
        'id' => 'dpi_homepage_sacraments_message_0017',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'The sacraments of Christian initiation. Baptism, Confirmation, and the Eucharist - lay the foundations of every Christian Life.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.sacraments p'
        ]
      ],
      [
        'id' => 'dpi_homepage_sacraments_link_0018',
        'method' => 'add_setting',
        'settings' => [
          'default' => '/sacraments/'
        ]
      ],
      [
        'id' => 'dpi_homepage_school_message_0019',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'St. Mark Catholic School, located in the heart of West Park, a high school prepatory institution.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.school p'
        ]
      ],
      [
        'id' => 'dpi_homepage_school_link_0020',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'http://www.stmarkwestpark.com/'
        ]
      ],
      [
        'id' => 'dpi_homepage_quote_message_0021',
        'method' => 'add_setting',
        'settings' => [
          'default' => '"The world tells us to seek success, power, and money; God tells us to seek humility, service, and love." - Pope Francis',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.featured-quote p'
        ]
      ],
      [
        'id' => 'dpi_homepage_quote_date_0022',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Dec. 5th 2016',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.featured-quote span'
        ]
      ],
      [
        'id' => 'dpi_footer_giving_link_0023',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_footer_sign_up_link_0024',
        'method' => 'add_setting',
        'settings' => [
          'default' => '#'
        ]
      ],
      [
        'id' => 'dpi_footer_hours_1_0025',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Monday - Friday: 9am - 4pm',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.site-footer .office-hours li:nth-of-type(2)'
        ]
      ],
      [
        'id' => 'dpi_footer_hours_2_0026',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Closed from 12 - 12:30pm',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.site-footer .office-hours li:nth-of-type(3)'
        ]
      ],
      [
        'id' => 'dpi_footer_address_0027',
        'method' => 'add_setting',
        'settings' => [
          'default' => '15800 Montrose Ave, Cleveland, OH 44111',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.site-footer .address li:nth-of-type(1)'
        ]
      ],
      [
        'id' => 'dpi_footer_phone_0028',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Phone: (216) 226-7577',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.site-footer .address li:nth-of-type(2)'
        ]
      ],
      [
        'id' => 'dpi_footer_fax_0029',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Fax: (216) 521-0371',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.site-footer .address li:nth-of-type(3)'
        ]
      ],
      [
        'id' => 'dpi_contact_email_0030',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'cbirchfield@stmarkcleveland.com',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.contact-info .email a'
        ]
      ],
      [
        'id' => 'dpi_contact_phone_0031',
        'method' => 'add_setting',
        'settings' => [
          'default' => '(216) 226-7577',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.contact-info .phone a'
        ]
      ],
      [
        'id' => 'dpi_contact_parish_name_0032',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'St. Mark Parish',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.contact-info .address p:first-of-type'
        ]
      ],
      [
        'id' => 'dpi_contact_street_0033',
        'method' => 'add_setting',
        'settings' => [
          'default' => '15800 Montrose Ave.',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.contact-info .address p:nth-of-type(2)'
        ]
      ],
      [
        'id' => 'dpi_contact_city_state_zip_0034',
        'method' => 'add_setting',
        'settings' => [
          'default' => 'Cleveland, OH 44111',
          'transport' => 'postMessage'
        ],
        'js_refresh' => [
          'type' => 'text',
          'selector' => '.contact-info .address p:last-of-type'
        ]
      ],
    ],
    'controls' => [
      [
        'id' => 'dpi_homepage_mass_time_1_control_0001',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Mass Time 1',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_time_1_0001'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_2_control_0002',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Mass Time 2',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_time_2_0002'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_3_control_0003',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Mass Time 3',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_time_3_0003'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_time_4_control_0004',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Mass Time 4',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_time_4_0004'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_view_more_link_control_0005',
        'method' => 'add_control',
        'settings' => [
          'label' => 'View More Link',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_times_view_more_link_0005'
        ]
      ],
      [
        'id' => 'dpi_homepage_mass_times_directions_link_control_0006',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Get Directions Link',
          'type' => 'text',
          'section' => 'dpi_homepage_mass_times_0001',
          'settings' => 'dpi_homepage_mass_times_directions_link_0006'
        ]
      ],
      [
        'id' => 'dpi_homepage_welcome_message_control_0007',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Welcome Message',
          'type' => 'textarea',
          'section' => 'dpi_homepage_welcome_0002',
          'settings' => 'dpi_homepage_welcome_message_0007'
        ]
      ],
      [
        'id' => 'dpi_homepage_welcome_video_control_0008',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Welcome Video',
          'type' => 'text',
          'section' => 'dpi_homepage_welcome_0002',
          'settings' => 'dpi_homepage_welcome_video_0008'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_message_control_0009',
        'method' => 'add_control',
        'settings' => [
          'label' => 'New to St. Marks Messsage',
          'type' => 'textarea',
          'section' => 'dpi_homepage_new_0003',
          'settings' => 'dpi_homepage_new_message_0009'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_link_control_0010',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Learn More Link',
          'type' => 'text',
          'section' => 'dpi_homepage_new_0003',
          'settings' => 'dpi_homepage_new_link_0010'
        ]
      ],
      [
        'id' => 'dpi_homepage_new_img_control_0011',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Featured Image',
          'type' => 'image',
          'section' => 'dpi_homepage_new_0003',
          'settings' => 'dpi_homepage_new_img_0011'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_message_control_0012',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Community Message',
          'type' => 'textarea',
          'section' => 'dpi_homepage_community_0004',
          'settings' => 'dpi_homepage_community_message_0012'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_link_control_0013',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Get Involved Link',
          'type' => 'text',
          'section' => 'dpi_homepage_community_0004',
          'settings' => 'dpi_homepage_community_link_0013'
        ]
      ],
      [
        'id' => 'dpi_homepage_community_img_control_0014',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Featured Image',
          'type' => 'image',
          'section' => 'dpi_homepage_community_0004',
          'settings' => 'dpi_homepage_community_img_0014'
        ]
      ],
      [
        'id' => 'dpi_homepage_upcoming_message_control_0015',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Upcoming Events Message',
          'type' => 'textarea',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_upcoming_message_0015'
        ]
      ],
      [
        'id' => 'dpi_homepage_upcoming_link_control_0016',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Upcoming Events Button Link',
          'type' => 'text',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_upcoming_link_0016'
        ]
      ],
      [
        'id' => 'dpi_homepage_sacraments_message_control_0017',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Sacraments Message',
          'type' => 'textarea',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_sacraments_message_0017'
        ]
      ],
      [
        'id' => 'dpi_homepage_sacraments_link_control_0018',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Sacraments Button Link',
          'type' => 'text',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_sacraments_link_0018'
        ]
      ],
      [
        'id' => 'dpi_homepage_school_message_control_0019',
        'method' => 'add_control',
        'settings' => [
          'label' => 'St. Mark School Message',
          'type' => 'textarea',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_school_message_0019'
        ]
      ],
      [
        'id' => 'dpi_homepage_school_link_control_0020',
        'method' => 'add_control',
        'settings' => [
          'label' => 'St. Mark School Button Link',
          'type' => 'text',
          'section' => 'dpi_homepage_icon_boxes_0005',
          'settings' => 'dpi_homepage_school_link_0020'
        ]
      ],
      [
        'id' => 'dpi_homepage_quote_message_control_0021',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Quote',
          'type' => 'textarea',
          'section' => 'dpi_homepage_quote_0006',
          'settings' => 'dpi_homepage_quote_message_0021'
        ]
      ],
      [
        'id' => 'dpi_homepage_quote_date_control_0022',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Date',
          'type' => 'text',
          'section' => 'dpi_homepage_quote_0006',
          'settings' => 'dpi_homepage_quote_date_0022'
        ]
      ],
      [
        'id' => 'dpi_footer_giving_link_control_0023',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Online Giving Link',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_giving_link_0023'
        ]
      ],
      [
        'id' => 'dpi_footer_sign_up_link_control_0024',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Sign Up Link',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_sign_up_link_0024'
        ]
      ],
      [
        'id' => 'dpi_footer_hours_1_control_0025',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Office Hours 1',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_hours_1_0025'
        ]
      ],
      [
        'id' => 'dpi_footer_hours_2_control_0026',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Office Hours 2',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_hours_2_0026'
        ]
      ],
      [
        'id' => 'dpi_footer_address_control_0027',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Address',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_address_0027'
        ]
      ],
      [
        'id' => 'dpi_footer_phone_control_0028',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Phone Number',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_phone_0028'
        ]
      ],
      [
        'id' => 'dpi_footer_fax_control_0029',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Fax Number',
          'type' => 'text',
          'section' => 'dpi_footer_info_0007',
          'settings' => 'dpi_footer_fax_0029'
        ]
      ],
      [
        'id' => 'dpi_contact_email_control_0030',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Email',
          'type' => 'text',
          'section' => 'dpi_contact_info_0008',
          'settings' => 'dpi_contact_email_0030'
        ]
      ],
      [
        'id' => 'dpi_contact_phone_control_0031',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Phone Number',
          'type' => 'text',
          'section' => 'dpi_contact_info_0008',
          'settings' => 'dpi_contact_phone_0031'
        ]
      ],
      [
        'id' => 'dpi_contact_parish_name_control_0032',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Parish Name',
          'type' => 'text',
          'section' => 'dpi_contact_info_0008',
          'settings' => 'dpi_contact_parish_name_0032'
        ]
      ],
      [
        'id' => 'dpi_contact_street_control_0033',
        'method' => 'add_control',
        'settings' => [
          'label' => 'Street',
          'type' => 'text',
          'section' => 'dpi_contact_info_0008',
          'settings' => 'dpi_contact_street_0033'
        ]
      ],
      [
        'id' => 'dpi_contact_city_state_zip_control_0034',
        'method' => 'add_control',
        'settings' => [
          'label' => 'City, State, Zip',
          'type' => 'text',
          'section' => 'dpi_contact_info_0008',
          'settings' => 'dpi_contact_city_state_zip_0034'
        ]
      ]
    ]
  ];

  public function __construct() {
    add_action( 'customize_register', [$this, 'init'] );
    add_action( 'customize_preview_init', [$this, 'customizer_js'] );
  }

  public function init( $wp_customize ) {
    $this->manager = $wp_customize;
    $this->recursive_register( $this->customizer );
    $this->remove_defaults();
  }

  public function recursive_register( $arr ) {
    $iterator = new RecursiveArrayIterator( $arr );
    while ( $iterator->valid() ) {
      if ( $iterator->hasChildren() ) {
        foreach( $iterator->getChildren() as $k => $component ) {
          $this->add_component( $component );
        }
      }
      $iterator->next();
    }
  }

  public function add_component( $component ) {
    $type = array_key_exists( 'type', $component['settings'] ) ? $component['settings']['type'] : '';
    $selective_refresh = array_key_exists( 'selective_refresh', $component );
    $js_refresh = array_key_exists( 'js_refresh', $component );

    if ( $component['id'] === 'dpi_contact_info_0008' ) {
      $component['settings']['active_callback'] = function() {return is_page_template( 'templates/template-contact-page.php' );};
    }

    if ( $selective_refresh ) {
      $this->add_partial( $component );
    } else if ( $js_refresh ) {
      $component['js_refresh']['id'] = $component['id'];
      array_push( $this->localize, $component['js_refresh'] );
    }

    switch ( $type ) {
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
      case 'custom':
        $this->manager->add_control(
          new WP_Customize_Control(
            $this->manager,
            $component['id'],
            $component['settings']
          )
        );
      default:
        call_user_func_array(
          [$this->manager, $component['method']],
          [$component['id'], $component['settings']]
        );
        break;
    }
  }

  public function add_partial( $component ) {
    $id = $component['id'];
    $component['selective_refresh']['settings'] = $id;
    $component['selective_refresh']['render_callback'] = function() use ( $id ) {
      return get_theme_mod( $id );
    };
    $this->manager->selective_refresh->add_partial( $id, $component['selective_refresh'] );
  }

  public function customizer_js() {
    wp_register_script( 'dpi-customizer-js', asset_path( 'scripts/js/customizer.js' ), ['jquery', 'customize-preview'], '1.0.0', true );
    wp_localize_script( 'dpi-customizer-js', 'dpi_cust_local', json_encode( $this->localize ) );
    wp_enqueue_script( 'dpi-customizer-js' );
  }

  public function remove_defaults() {
    $defaults = [
      'colors',
      'header_image',
      'background_image',
      'static_front_page',
      'custom_css',
      'themes',
    ];
    foreach( $defaults as $default ) {
      $this->manager->remove_section( $default );
    }
    // can't remove the menus or widget panels with remove_panel(), thanks wordpress...
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
