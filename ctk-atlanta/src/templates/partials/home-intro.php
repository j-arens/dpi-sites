<?php

  $p1_fallback = 'Please use this site to access the information you need about our parish and its resources
  as well as a resource for broadening your faith. We look forward to hearing from you and
  answering any questions you might have.';

  $p2_fallback = 'Please use this site to access the information you need about our parish and its resources
  as well as a resource for broadening your faith. We look forward to hearing from you and
  answering any questions you might have.';

  $p3_fallback = 'Our Cathedral Family consists of well over 5,700 registered Parishioners who are deeply
  involved in the over 100 Ministries in service at the Cathedral. Please prayerfully consider
  using your Time and Talent to support furthering the message of Christ through our
  Ministries.';

?>

<section class="home-intro">
  <div class="container">
    <h3><?php echo get_theme_mod( 'dpi_homepage_intro_title_0003', 'Welcome To The' ); ?></h3>
    <p class="subheading"><?php echo get_theme_mod( 'dpi_homepage_intro_subtitle_0006', 'Cathedral of Christ the King' ); ?></p>
    <div class="content">
      <aside class="rev-image">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/rev-mcnamee.png' ?>" alt="Reverend Monsignor Francis G. McNamee" />
        <div class="caption">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/rev-mcnamee-caption-01.svg' ?>" alt="Rev. McNamee Caption" />
          <a href="/pastors_corner/">From The Desk Of The Rector ></a>
        </div>
      </aside>
      <p><?php echo get_theme_mod( 'dpi_homepage_intro_message_p1_0012', $p1_fallback ); ?></p>
      <p><?php echo get_theme_mod( 'dpi_homepage_intro_message_p2_0013', $p2_fallback ); ?></p>
      <p><?php echo get_theme_mod( 'dpi_homepage_intro_message_p3_0017', $p3_fallback ); ?></p>
    </div>
  </div>
</section>
