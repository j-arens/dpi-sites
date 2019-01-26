<?php

  $layout = [
    'title' => [
      'spanish' => [
        'text' => 'Conectate Con Nosotros!'
      ],
      'english' => [
        'text' => 'Connect With Us!'
      ]
    ],
    'buttons' => [
      '1' => [
        'spanish' => [
          'icon' => '/assets/icons/bell.svg',
          'text' => 'Ministerio hispano',
          'link' => '/ministries/hispanic-ministry/',
          'target' => ''
        ],
        'english' => [
          'icon' => '/assets/icons/bible.svg',
          'text' => 'Bulletins',
          'link' => '/bulletins/',
          'target' => ''
        ]
      ],
      '2' => [
        'spanish' => [
          'icon' => '/assets/icons/bible.svg',
          'text' => 'Sacramentos',
          'link' => '/sacramentos/',
          'target' => ''
        ],
        'english' => [
          'icon' => '/assets/icons/podcasts-icon-01.svg',
          'text' => 'Podcasts',
          'link' => 'http://ctkfaithformation.podbean.com/',
          'target' => '_blank'
        ]
      ],
      '3' => [
        'spanish' => [
          'icon' => '/assets/icons/homilies-icon-01.svg',
          'text' => 'Ministerios',
          'link' => '/ministerios/',
          'target' => ''
        ],
        'english' => [
          'icon' => '/assets/icons/mpa-icon-01.svg',
          'text' => 'Our App',
          'link' => 'https://mypari.sh/kr3',
          'target' => '_blank'
        ]
      ],
      '4' => [
        'spanish' => [
          'icon' => '/assets/icons/smartphone.svg',
          'text' => 'Contacto',
          'link' => '/contacto/',
          'target' => ''
        ],
        'english' => [
          'icon' => '/assets/icons/homilies-icon-01.svg',
          'text' => 'Rector\'s Desk',
          'link' => '/pastors_corner/',
          'target' => ''
        ]
      ]
    ]
  ];

  $language = 'english';
  $spanish_pages = [21429, 352, 22335, 22338];

  if ( in_array( get_the_ID(), $spanish_pages ) ) {
    $language = 'spanish';
  }

?>

<aside class="site-sidebar">
  <!-- <h3 class="sidebar-title">Connect With Us!</h3> -->
  <h3 class="sidebar-title"><?php echo $layout['title'][$language]['text']; ?></h3>
  <section class="sidebar-links">
    <!-- <a class="sidebar-bulletins button button-secondary" href="/bulletins/"> -->
    <a class="sidebar-bulletins button button-secondary" href="<?php echo $layout['buttons']['1'][$language]['link']; ?>" target="<?php echo $layout['buttons']['1'][$language]['target'] ?>">
      <span><i class="icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . $layout['buttons']['1'][$language]['icon'] ?>)"></i><?php echo $layout['buttons']['1'][$language]['text'] ?></span>
    </a>
    <!-- <a class="sidebar-podcasts button button-secondary" href="http://ctkfaithformation.podbean.com/" target="_blank"> -->
    <a class="sidebar-bulletins button button-secondary" href="<?php echo $layout['buttons']['2'][$language]['link']; ?>" target="<?php echo $layout['buttons']['2'][$language]['target'] ?>">
      <span><i class="icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . $layout['buttons']['2'][$language]['icon'] ?>)"></i><?php echo $layout['buttons']['2'][$language]['text'] ?></span>
    </a>
    <!-- <a class="sidebar-mpa button button-secondary" href="https://mypari.sh/kr3" target="_blank"> -->
    <a class="sidebar-bulletins button button-secondary" href="<?php echo $layout['buttons']['3'][$language]['link']; ?>" target="<?php echo $layout['buttons']['3'][$language]['target'] ?>">
      <span><i class="icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . $layout['buttons']['3'][$language]['icon'] ?>)"></i><?php echo $layout['buttons']['3'][$language]['text'] ?></span>
    </a>
    <!-- <a class="sidebar-rectors-desk button button-secondary" href="/pastors_corner/"> -->
    <a class="sidebar-bulletins button button-secondary" href="<?php echo $layout['buttons']['4'][$language]['link']; ?>" target="<?php echo $layout['buttons']['4'][$language]['target'] ?>">
      <span><i class="icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . $layout['buttons']['4'][$language]['icon'] ?>)"></i><?php echo $layout['buttons']['4'][$language]['text'] ?></span>
    </a>
  </section>
  <section class="sidebar-events">
    <?php echo do_shortcode( '[dpi_parish_events layout="sidebar"]' ); ?>
  </section>
</aside>
