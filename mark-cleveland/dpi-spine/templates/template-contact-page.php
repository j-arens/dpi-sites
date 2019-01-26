<?php
/**
 * Template Name: Contact Page
 */

 $email_fallback = 'cbirchfield@stmarkcleveland.com';
 $phone_fallback = '(216) 226-7577';
 $name_fallback = 'St. Mark Parish';
 $steet_fallback = '15800 Montrose Ave.';
 $csz_fallback = 'Cleveland, OH 44111';

 ?>
 <div class="page-header">
    <h1>Contact</h1>
 </div>
 <article>
  <section class="info">
    <div class="contact-info">
      <ul>
        <li class="email"><a href="mailto:<?php echo get_theme_mod( 'dpi_contact_email_0030', $email_fallback ); ?>"><?php echo get_theme_mod( 'dpi_contact_email_0030', $email_fallback ); ?></a></li>
        <li class="phone"><a href="tel:<?php echo get_theme_mod( 'dpi_contact_phone_0031', $phone_fallback ); ?>"><?php echo get_theme_mod( 'dpi_contact_phone_0031', $phone_fallback ); ?></a></li>
        <li class="address">
          <div>
            <p><?php echo get_theme_mod( 'dpi_contact_parish_name_0032', $name_fallback ); ?></p>
            <p><?php echo get_theme_mod( 'dpi_contact_street_0033', $steet_fallback ) ?></p>
            <p><?php echo get_theme_mod( 'dpi_contact_city_state_zip_0034', $csz_fallback ); ?></p>
          </div>
        </li>
      </ul>
    </div>
    <div class="contact-form">
      <?php echo do_shortcode( '[contact-form-7 id="313" title="Contact form 1"]' ); ?>
    </div>
  </section>
  <section class="map">
    <div class="iframe-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11958.739263375854!2d-81.8070814!3d41.4677509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc5feac9affce4f4!2sSt+Mark&#39;s+Church!5e0!3m2!1sen!2sus!4v1488562961646" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </section>
</article>
