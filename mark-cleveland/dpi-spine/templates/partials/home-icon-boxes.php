<?php

  $p1_fallback = 'Stay up-to-date by following our calendar and joining our mailing list.';
  $link_1_fallback = '/news-events/';

  $p2_fallback = 'The sacraments of Christian initiation. Baptism, Confirmation, and the Eucharist - lay the foundations of every Christian Life.';
  $link_2_fallback = '/sacraments/';

  $p3_fallback = 'St. Mark Catholic School, located in the heart of West Park, a high school prepatory institution.';
  $link_3_fallback = 'http://www.stmarkwestpark.com/';

?>

<section class="home-icon-boxes container">
  <div class="row">
    <div class="upcoming-events icon-box col-xw-2 offset-xw-2 col-xl-4 col-xs-12">
      <div class="icon"></div>
      <h3>Upcoming Events</h3>
      <p><?php echo get_theme_mod( 'dpi_homepage_upcoming_message_0015', $p1_fallback ); ?></p>
      <a class="button button-secondary" href="<?php echo get_theme_mod( 'dpi_homepage_upcoming_link_0016', $link_1_fallback ); ?>">Learn More</a>
    </div>
    <div class="sacraments icon-box col-xw-2 offset-xw-1 col-xl-4 col-xs-12">
      <div class="icon"></div>
      <h3>Sacraments</h3>
      <p><?php echo get_theme_mod( 'dpi_homepage_sacraments_message_0017', $p2_fallback ); ?></p>
      <a class="button button-secondary" href="<?php echo get_theme_mod( 'dpi_homepage_sacraments_link_0018', $link_2_fallback ); ?>">Learn More</a>
    </div>
    <div class="school icon-box col-xw-2 offset-xw-1 col-xl-4 col-xs-12">
      <div class="icon"></div>
      <h3>St. Mark School</h3>
      <p><?php echo get_theme_mod( 'dpi_homepage_school_message_0019', $p3_fallback ); ?></p>
      <a class="button button-secondary" href="<?php echo get_theme_mod( 'dpi_homepage_school_link_0020', $link_3_fallback ) ?>" target="_blank">Learn More</a>
    </div>
  </div>
</section>
