<?php

  $bg_img = get_template_directory_uri() . '/';
  $scrollTo = '.';

  if ( is_home() ) {
    $bg_img .= 'assets/images/header-home-bg-2.jpg';
    $scrollTo .= 'home-intro';
  } else {
    $bg_img .= 'assets/images/header-inner-bg-' . array_rand( array_flip( [1, 2, 3] ), 1 ) . '.jpg';
    $scrollTo .= 'wrap';
  }
?>

<noscript>This site requires JavaScript to function.</noscript>
<header class="site-header <?php echo is_home() ? 'home' : 'inner'  ?>" style="background-image: url(<?php echo $bg_img; ?>)">
  <div class="container">
    <?php
      get_template_part( 'partials/site-nav' );

      if ( is_home() ) {
        echo '
          <div class="hero">
            <p class="intro-heading">We Are Called</p>
            <img src="' . get_stylesheet_directory_uri() . '/assets/images/header-cta-01.svg" alt="church-cta" />
            <p class="intro-subheading">To Know, Love, and Serve as Jesus Did</p>
            <a class="button button-transparent" href="/english-mass-schedule/">Schedules & Directions</a>
            <button id="explore-button" class="button button-transparent button-round" data-scrollTo="' . $scrollTo . '">Explore</button>
          </div>
        ';
      } else {
        if ( is_search() ) {
          echo '<h1 class="header-page-title">Search: ' . get_search_query() . '</h1>';
        } else if ( is_404() ) {
          echo '<h1 class="header-page-title">Page Not Found</h1>';
        } else if ( is_post_type_archive( 'parish_events' ) ) {
          echo '<h1 class="header-page-title">Events</h1>';
        } else if ( is_post_type_archive( 'pastors_corner' ) ) {
          echo '<h1 class="header-page-title">From The Desk Of The Rector</h1>';
        } else if ( is_page_template( 'templates/template-mass-times.php' ) ) {
          echo '
            <h1 class="header-page-title">Mass Times Schedule & Directions</h1>
          ';
        } else {
          echo '
            <h1 class="header-page-title">' . get_the_title() . '</h1>
          ';
        }
      }
    ?>
  </div>
</header>

<?php
  if ( is_home() ) {
    get_template_part( 'partials/live-stream-cta' );
  }
?>
