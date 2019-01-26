<?php 

  require_once get_template_directory() . '/scripts/php/nav-walker.php';

  $socialMedia = dpiGetSocialMediaLinks();

?>
<header class="site-header container">
  <div class="row">
    <div class="site-header__logo col-xl-2 col-xw-2 offset-xw-2">
      <a href="<?=esc_url(home_url('/'));?>" class="site-header__logo-link">
        <?php get_template_part('svg/ctr-logo-white'); ?>
      </a>
    </div>
    <nav class="site-header__nav col-xl-10 col-xw-6">
      <ul class="site-header__nav-links">
        <li class="site-header__nav-link-item dpiSearch-toggle">
          <a href="#" class="site-header__nav-link">
            <?php get_template_part('svg/search-circle-white') ?>
          </a>
        </li>
        <li class="site-header__nav-link-item">
          <a href="<?=esc_url($socialMedia['facebook'])?>" target="_blank" class="site-header__nav-link">
            <?php get_template_part('svg/facebook-circle-white') ?>
          </a>
        </li>
        <li class="site-header__nav-link-item">
          <a href="<?=esc_url($socialMedia['twitter'])?>" target="_blank" class="site-header__nav-link">
            <?php get_template_part('svg/twitter-circle-white') ?>
          </a>
        </li>
        <li class="site-header__nav-link-item">
          <a href="<?=esc_url($socialMedia['instagram'])?>" target="_blank" class="site-header__nav-link">
            <?php get_template_part('svg/instagram-circle-white') ?>
          </a>
        </li>
      </ul>
      <div class="site-header__nav-container">
        <button class="site-nav__mobile-toggle js-mobile-toggle">
          <svg class="site-nav__mobile-toggle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <path d="M0 8 L24 8"></path>
            <path class="site-nav__mobile-toggle-focus_line" d="M0 8 L24 8"></path>
            <circle cx="29" cy="8" r="1"></circle>
            <circle class="site-nav__mobile-toggle-focus_circle" cx="29" cy="8" r="1"></circle>
            <path d="M0 16 L32 16"></path>
            <path class="site-nav__mobile-toggle-focus_line" d="M0 16 L32 16"></path>
            <path d="M0 24 L32 24"></path>
            <path class="site-nav__mobile-toggle-focus_line" d="M0 24 L32 24"></path>
          </svg>
        </button>
        <?php 
          wp_nav_menu([
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'theme_location' => 'primary_navigation',
            'menu_class' => 'site-nav__menu',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 3,
            'walker' => new NavWalker()
          ]);
        ?>
      </div>
    </nav>
  </div>
</header>
