<?php 

  $contactInfo = array_merge(
    [
      'email' => 'office@ctrcc.net',
      'phone' => '(706) 265-1361',
      'road' => '991 Kilough Church Rd.,',
      'city_state_zip' => 'Dawsonville, GA 30534'
    ],
    array_filter(
      [
        'email' => get_field('contact_email_address'),
        'phone' => get_field('contact_phone_number'),
        'road' => get_field('contact_road'),
        'city_state_zip' => get_field('contact_city_state_zip')
      ]
    )
  );

  $socialMedia = dpiGetSocialMediaLinks();

?>

<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="site-footer__links col-xl-2 offset-xl-2">
        <a href="<?=esc_url(home_url('/'));?>" class="site-footer__link-logo">
          <?php get_template_part('svg/ctr-logo-white'); ?>
        </a>
        <ul class="site-footer__links-social">
          <li class="site-footer__links-social-item">
            <a href="<?=esc_url($socialMedia['facebook'])?>" target="_blank" class="site-footer__links-social-link">
              <?php get_template_part('svg/facebook-circle-white') ?>
            </a>
          </li>
          <li class="site-footer__links-social-item">
            <a href="<?=esc_url($socialMedia['twitter'])?>" target="_blank" class="site-footer__links-social-link">
              <?php get_template_part('svg/twitter-circle-white') ?>
            </a>
          </li>
          <li class="site-footer__links-social-item">
            <a href="<?=esc_url($socialMedia['instagram'])?>" target="_blank" class="site-footer__links-social-link">
              <?php get_template_part('svg/instagram-circle-white') ?>
            </a>
          </li>
        </ul>
      </div>
      <div class="site-footer__contact col-xl-2">
        <?php get_template_part('svg/email-circle-white') ?>
        <p class="site-footer__contact-title">
          Email:
        </p>
        <a href="mailto:<?=$contactInfo['email']?>" target="_blank" class="site-footer__contact-link"><?=$contactInfo['email']?></a>
      </div>
      <div class="site-footer__contact col-xl-2">
        <?php get_template_part('svg/phone-circle-white'); ?>
        <p class="site-footer__contact-title">
          Phone
        </p>
        <a href="tel:<?=$contactInfo['phone']?>" class="site-footer__contact-link"><?=$contactInfo['phone']?></a>
      </div>
      <div class="site-footer__contact col-xl-2">
        <?php get_template_part('svg/map-marker-circle-white') ?>
        <p class="site-footer__contact-title">
          <?=$contactInfo['road']?> <?=$contactInfo['city_state_zip']?>
        </p>
      </div>
    </div>
    <div class="site-info">
      <p class="site-info__copyright">
        &copy; <?=Date('Y')?> Christ the Redeemer Catholic Church | Dawsonville, GA
      </p>
      <p class="site-info__diocesan">
        Made with &hearts; by <a class="site-info__diocesan-link" href="//diocesan.com" target="_blank">Diocesan Publications</a>
      </p>
    </div>
  </div>
</footer>