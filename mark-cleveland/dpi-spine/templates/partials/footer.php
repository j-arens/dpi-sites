<?php

$button_1_fallback = '#';
$button_2_fallback = '#';

$hours_1_fallback = 'Monday - Friday: 9am - 4pm';
$hours_2_fallback = 'Closed from 12 - 12:30pm';

$address_fallback = '15800 Montrose Ave, Cleveland, OH 44111';
$phone_fallback = 'Phone: (216) 226-7577';
$fax_fallback = 'Fax: (216) 521-0371';

get_template_part( 'partials/featured-quote' );

?>
<footer class="site-footer container">
  <div class="row">
    <div class="footer-links">
      <a class="button button-secondary button-thin" href="<?php echo get_theme_mod( 'dpi_footer_giving_link_0023', $button_1_fallback ) ?>">Online Giving</a>
      <a class="button button-secondary button-thin" href="<?php echo get_theme_mod( 'dpi_footer_sign_up_link_0024', $button_2_fallback ) ?>">Sign-Up</a>
    </div>
    <div class="footer-info">
      <ul class="office-hours">
        <li><strong>Office Hours</strong></li>
        <li><?php echo get_theme_mod( 'dpi_footer_hours_1_0025', $hours_1_fallback ); ?></li>
        <li><?php echo get_theme_mod( 'dpi_footer_hours_2_0026', $hours_2_fallback ); ?></li>
      </ul>
      <ul class="address">
        <li><?php echo get_theme_mod( 'dpi_footer_address_0027', $address_fallback ); ?></li>
        <li><?php echo get_theme_mod( 'dpi_footer_phone_0028', $phone_fallback ); ?></li>
        <li><?php echo get_theme_mod( 'dpi_footer_fax_0029', $fax_fallback ); ?></li>
      </ul>
    </div>
    <div class="footer-logo">
      <div class="logo-placeholder"></div>
    </div>
    <div class="footer-map">
      <div class="iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2989.686647465768!2d-81.81027778412711!3d41.46771117925692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8830ed89c7d358ef%3A0x4c0cfc555d96a64b!2s15800+Montrose+Ave%2C+Cleveland%2C+OH+44111!5e0!3m2!1sen!2sus!4v1485190456843" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <button id="return-button" class="return-button hvr-pulse" data-scrollto=".site-header">
    <span></span>
  </button>
  <div class="site-info">
    <p>&copy; 2016 St. Mark Parish | Made with &hearts; by <a href="http://diocesan.com" target="_blank">Diocesan Publications</a></p>
  </div>
</footer>
