<?php 

  $contactInfo = [
    'address' => get_post_meta(37, 'Address', true),
    'address_fallback' => '1729 Stop 30 Rd Hendersonville, TN 37075',
    'email' => get_post_meta(37, 'Email Address', true),
    'email_fallback' => 'contact@ololcc.org',
    'facebook' => get_post_meta(37, 'Facebook', true),
    'facebook_fallback' => 'https://www.facebook.com/OurLadyoftheLakeTN/',
    'fax' => get_post_meta(37, 'Fax Number', true),
    'fax_fallback' => '(615) 824-7989',
    'phone' => get_post_meta(37, 'Phone Number', true),
    'phone_fallback' => '(615) 824-3276',
    'twitter' => get_post_meta(37, 'Twitter', true),
    'twitter_fallback' => 'https://twitter.com/ololccTN'
  ];

?>

<footer class="site-footer container <?php echo (is_home() ? "" : "footer-wave__down") ?>">
  <div class="row">
    <div class="site-footer__left col-xs-12 col-lg-7">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
        <?php get_template_part('svg/logo-white'); ?>
      </a>
      <div class="site-footer__contact-container">
        <ul class="site-footer__address">
          <li class="site-footer__address-heading font-yk">Where Are We?</li>
          <li class="site-footer__address-item">1729 Stop 30 Rd</li>
          <li class="site-footer__address-item">Hendersonville, TN</li>
          <li class="site-footer__address-item">37075</li>
        </ul>
        <ul class="site-footer__contact">
          <li class="site-footer__contact-heading font-yk">
            Need To Reach Us?
          </li>
          <li class="site-footer__contact-item">
            <a class="site-footer__contact-link" href="tel:<?php echo (empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']); ?>">
              <?php echo (empty($contactInfo['phone']) ? $contactInfo['phone_fallback'] : $contactInfo['phone']); ?>
            </a>
          </li>
          <li class="site-footer__contact-item">
            <a class="site-footer__contact-link" href="fax:<?php echo (empty($contactInfo['fax']) ? $contactInfo['fax_fallback'] : $contactInfo['fax']); ?>">
              Fax <?php echo (empty($contactInfo['fax']) ? $contactInfo['fax_fallback'] : $contactInfo['fax']); ?>
            <a/>
          </li>
          <li class="site-footer__contact-item">
            <a class="site-footer__contact-link" href="mailto:<?php echo (empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']); ?>">
              <?php echo (empty($contactInfo['email']) ? $contactInfo['email_fallback'] : $contactInfo['email']); ?>
            </a>
          </li>
          <li class="site-footer__contact-item site-footer__contact-item_social">
            <a class="site-footer__contact-social" href="https://mypari.sh/95z" target="_blank">
              <?php get_template_part('svg/mpa-icon') ?>
            </a>
            <a class="site-footer__contact-social" href="<?php echo (empty($contactInfo['twitter']) ? $contactInfo['twitter_fallback'] : $contactInfo['twitter']); ?>" target="_blank">
              <?php get_template_part('svg/twitter-icon') ?>
            </a>
            <a class="site-footer__contact-social" href="<?php echo (empty($contactInfo['facebook']) ? $contactInfo['facebook_fallback'] : $contactInfo['facebook']); ?>" target="_blank">
              <?php get_template_part('svg/facebook-icon') ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="site-footer__right col-xs-12 col-lg-5">
      <div class="site-footer__map-container">
        <?php echo do_shortcode('[dpi_maps]'); ?>
      </div>
    </div>
  </div>
  <div class="site-info">
    <p class="site-info__parish">&copy; <?php echo date('Y'); ?> Our Lady of the Lake | Hendersonville, TN</p>
    <p class="site-info__diocesan">Made with <span class="site-info__diocesan-heart">&hearts;</span> by <a class="site-info__diocesan-link" href="https://diocesan.com" target="_blank">Diocesan Publications</a></p>
  </div>
  <div class="searchmodal__container">
    <button class="searchmodal__toggle">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
      Close
    </button>
    <?php get_search_form(); ?>
  </div>
</footer>
