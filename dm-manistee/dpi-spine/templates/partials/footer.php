<?php

  $contacts = [
    [
      'name' => get_theme_mod('dpi_footer_contact_1_title_0034'),
      'name_fallback' => 'Parish Office',
      'address' => get_theme_mod('dpi_footer_contact_1_address_0035'),
      'address_fallback' => '254 Sixth Street, Manistee, MI 49660'
    ],
    [
      'name' => get_theme_mod('dpi_footer_contact_2_title_0036'),
      'name_fallback' => 'St. Joseph Church',
      'address' => get_theme_mod('dpi_footer_contact_2_address_0037'),
      'address_fallback' => '249 Sixth Street, Manistee, MI 49660'
    ]
  ];

?>

<footer class="site-footer container">
  <div class="row">
    <div class="footer-info col-xs-12 col-lg-6 col-xl-4">
      <a href="<?= esc_url(home_url('/')); ?>">
        <span class="footer-logo-img"></span>
        Divine Mercy Parish
      </a>
      <div class="footer-form-container">
        <p>Sign-Up for our Bulletin</p>
        <form action="">
          <input class="maven-pro" type="text" placeholder="Subscribe">
          <input type="submit">
        </form>
      </div>
    </div>
    <div class="footer-contact col-xs-12 col-lg-6 col-xl-4">
      <?php
        foreach($contacts as $contact) {
          echo '
            <div class="footer-parish">
              <p class="footer-parish-name">' . (empty($contact['name']) ? $contact['name_fallback'] : $contact['name']) . '</p>
              <p class="footer-parish-address maven-pro">' . (empty($contact['address']) ? $contact['address_fallback'] : $contact['address']) . '</p>
            </div>
          ';
        } 
      ?>
    </div>
    <div class="footer-map col-xs-12 col-xl-4">
      <?php echo do_shortcode('[dpi_maps]'); ?>
    </div>
  </div>
  <div class="site-info">
    <p class="maven-pro">&copy; Copyright <?php echo date('Y'); ?> Divine Mercy Parish</p>
    <p class="maven-pro">Built with &hearts; by <a class="maven-pro" href="http://diocesan.com" target="_blank">Diocesan Publications</a></p>
  </div>
</footer>
