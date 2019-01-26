<?php
/**
 * Template Name: Contact Template
 */

$contactInfo = [
  'phone' => get_post_meta($post->ID, 'Phone Number', true),
  'phone_fallback' => '(616) 796-2317',
  'street' => get_post_meta($post->ID, 'Street', true),
  'street_fallback' => '195 West 13th. Street',
  'location' => get_post_meta($post->ID, 'Location', true),
  'location_fallback' => 'St. Francis De Sales Parish Office',
  'name' => get_post_meta($post->ID, 'Foundation Name', true),
  'name_fallback' => 'Corpus Christi Foudation of Holland/Zeeland',
  'email' => get_post_meta($post->ID, 'Email Address', true),
  'email_fallback' => 'info@ccfhollandzeeland.org',
  'address' => get_post_meta($post->ID, 'City, State, Zip', true),
  'address_fallback' => 'Holland, MI 49423'
];

?>

<h1>Contact Us</h1>

<!-- contact info/form -->
<section class="contact-info">
  <div class="contact">
    <ul>
      <li class="email">
        <a href="mailto:<?php echo empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email'] ?>"><?php echo empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email'] ?></a>
      </li>
      <li class="phone">
        <a href="<?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone'] ?>"><?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone'] ?></a>
      </li>
      <li class="address">
        <p>
          <?php echo empty($contactInfo['name']) ? $contactInfo['name_fallback'] : $contactInfo['name'] ?>
          <br>
          <?php echo empty($contactInfo['location']) ? $contactInfo['location_fallback'] : $contactInfo['location'] ?>
          <br>
          <?php echo empty($contactInfo['street']) ? $contactInfo['street_fallback'] : $contactInfo['street'] ?>
          <br>
          <?php echo empty($contactInfo['address']) ? $contactInfo['address_fallback'] : $contactInfo['address'] ?>
        </p>
      </li>
    </ul>
  </div>
  <div class="form">
    <?php echo do_shortcode( '[contact-form-7 id="232" title="Contact Page Form"]' ); ?>
  </div>
</section>
<!-- end contact info/form -->

<!-- map -->
<section class="map">
  <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d775.5584678105039!2d-86.11657962601778!3d42.78583742956855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8819f2c70759c86f%3A0xb8c4f27542800126!2s195+W+13th+St%2C+Holland%2C+MI+49423!5e0!3m2!1sen!2sus!4v1483663991799" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</section>
<!-- end map -->
