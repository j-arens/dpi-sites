<?php 

  $contactInfo = [
    'address' => [
      'mod' => get_theme_mod('dpi_footer_contact_info_address_0033'),
      'fallback' => '1311 Robinson Dr, Haines City, FL 33845'
    ],
    'phone' => [
      'mod' => get_theme_mod('dpi_footer_contact_info_phone_0034'),
      'fallback' => '(863) 422-4370'
    ],
    'email' => [
      'mod' => get_theme_mod('dpi_footer_contact_info_email_0035'),
      'fallback' => 'luz@stannhc.org'
    ]
  ];

?>

<footer class="site-footer">
  <?php if (!is_page_template('templates/template_contact.php')): ?>
  <button id="slideout-toggle" class="site-footer--return">
    <svg class="inline-svg-icon plus-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
    <svg class="inline-svg-icon minus-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/></svg>
  </button>
  <div class="site-footer-map">
    <?php echo do_shortcode('[dpi_maps]'); ?>
  </div>
  <?php endif; ?>
  <div class="site-footer-content">
    <div class="site-footer-content-wrap">
      <p class="site-footer-cta font-light">&ldquo;Two different cultures one community of faith&rdquo;</p>
      <ul class="site-footer-contact">
        <li class="site-footer-contact--item">
          <p class="site-footer-contact--item_title font-bold">Address</p>
          <p class="site-footer-contact--item_content font-light">
            <?php echo empty($contactInfo['address']['mod']) ? $contactInfo['address']['fallback'] : $contactInfo['address']['mod']; ?>
          </p>
        </li>
        <li class="site-footer-contact--item">
          <p class="site-footer-contact--item_title font-bold">Phone</p>
          <a class="site-footer-contact--item_content font-light" href="tel:<?php echo empty($contactInfo['phone']['mod']) ? $contactInfo['phone']['fallback'] : $contactInfo['phone']['mod']; ?>">
            <?php echo empty($contactInfo['phone']['mod']) ? $contactInfo['phone']['fallback'] : $contactInfo['phone']['mod']; ?>
          </a>
        </li>
        <li class="site-footer-contact--item">
          <p class="site-footer-contact--item_title font-bold">Email</p>
          <a class="site-footer-contact--item_content font-light" href="mailto:<?php echo empty($contactInfo['email']['mod']) ? $contactInfo['email']['fallback'] : $contactInfo['email']['mod']; ?>" >
            <?php echo empty($contactInfo['email']['mod']) ? $contactInfo['email']['fallback'] : $contactInfo['email']['mod']; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="site-info">
    <p class="site-info--copyright font-light">
      &copy; 2005 - <?php echo date('Y'); ?> St. Ann Catholic Church | Haines, Florida
    </p>
    <p class="site-info--dpi font-light">
      Made with &hearts; by <a class="site-info--dpi_link" href="https://diocesan.com" target="_blank">Diocesan Publications</a>
    </p>
  </div>
</footer>