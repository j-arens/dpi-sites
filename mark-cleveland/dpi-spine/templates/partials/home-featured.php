<?php

  $p1_fallback = 'Thank you for coming to St. Mark Parish of Cleveland, OH. St. Mark is a Christian community committed to Spiritual growth through the Word of God, the Bread of Life, and the guidance of the Holy Spirit. We are dedicated to celebrating the Eucharist and to the continued development of our historically strong Christian education and outreach.';

  $img_1_fallback = get_template_directory_uri() . '/assets/images/video-placeholder.jpg';

  $link_1_fallback = '/news-events/';

  $p2_fallback = 'Join us for mass and other events here at St. Mark Parish.';

  $img_2_fallback = get_template_directory_uri() . '/assets/images/new-placeholder.jpg';

  $link_2_fallback = '/helping-others/';

  $p3_fallback = 'Learn more about volunteer opportunities with church and community.';

  $img_3_fallback = get_template_directory_uri() . '/assets/images/community-placeholder.jpg';

?>

<section class="home-featured container">
  <div class="row welcome-row">
    <div class="content-wrap col-md-12 col-lg-6 col-xl-4 offset-xl-3 pull-xl-1">
      <h1>Welcome</h1>
      <p><?php echo get_theme_mod( 'dpi_homepage_welcome_message_0007', $p1_fallback ) ?></p>
    </div>
    <div class="featured-video col-md-12 col-lg-6 col-xl-5" style="background-image: url(<?php echo get_theme_mod( 'dpi_homepage_welcome_video_0008', $img_1_fallback ); ?>)"></div>
  </div>
  <div class="row new-row">
    <div class="featured-image col-md-12 col-lg-6 col-xl-5" style="background-image: url(<?php echo get_theme_mod( 'dpi_homepage_new_img_0011', $img_2_fallback ); ?>)"></div>
    <div class="content-wrap col-md-12 col-lg-6 col-xl-4 offset-xl-3 pull-xl-2">
      <h1>New to St. Marks?</h1>
      <p><?php echo get_theme_mod( 'dpi_homepage_new_message_0009', $p2_fallback ); ?></p>
      <a class="button button-primary" href="<?php echo get_theme_mod( 'dpi_homepage_new_link_0010', $link_1_fallback ) ?>">Learn More</a>
    </div>
  </div>
  <div class="row community-row">
    <div class="content-wrap col-md-12 col-lg-6 col-xl-4 offset-xl-3 pull-xl-1">
      <h1>Want to Help the Community?</h1>
      <p><?php echo get_theme_mod( 'dpi_homepage_community_message_0012', $p3_fallback );  ?></p>
      <a class="button button-primary" href="<?php echo get_theme_mod( 'dpi_homepage_community_link_0013', $link_2_fallback ) ?>">Get Involved</a>
    </div>
    <div class="featured-image col-md-12 col-lg-6 col-xl-5" style="background-image: url(<?php echo get_theme_mod( 'dpi_homepage_community_img_0014', $img_3_fallback ) ?>)"></div>
  </div>
</section>
