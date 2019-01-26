<?php 

  $contactInfo = [
    'phone' => get_theme_mod('dpi_header_contact_phone_0001'),
    'phone_fallback' => '(863) 422-4370',
    'address' => get_theme_mod('dpi_header_contact_address_0002'),
    'address_fallback' => '1311 Robinson Dr, Haines City, FL 33845'
  ];

?>

<header class="site-header">
  <?php get_template_part('partials/search-modal'); ?>
  <div class="site-branding container">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo"></a>
  </div>
  <div class="topbar">
    <div class="container">
      <ul class="topbar-parish-info">
        <li class="topbar-parish-info--item">
          <a class="topbar-parish-info--link font-light" href="tel:<?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone'] ?>"><?php echo empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone'] ?></a>
        </li>
        <li class="topbar-parish-info--item">
          <p class="topbar-parish-info--link font-light"><?php echo empty($contactInfo['address']) ? $contactInfo['address_fallback'] : $contactInfo['address'] ?></p>
        </li>
        <!--<li class="topbar-parish-info--item">
          <a href="#" class="topbar-parish-info--button online-giving-button"></a>
        </li>-->
        <li class="topbar-parish-info--item">
          <button id="search-modal-open" class="topbar-parish-info--button" data-action="open">
            <?php get_template_part('svg/search-glass'); ?>
          </button>
        </li>
    </ul>
    </div>
  </div>
  <?php get_template_part('partials/site-nav') ?>
</header>
