<?php
require_once get_template_directory() . '/scripts/php/DPI_Slider_Nav_Walker.php';
?>

<div id="slider-menu">
  <div class="body-click"></div>
  <div class="container topbar">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
    <button id="nav-toggle-open" class="button button-transparent button-round">
      Menu
    </button>
    <nav id="site-nav">
      <button id="nav-toggle-close" class="hide button button-transparent button-round">
        Close
      </button>
      <div class="nav-container">
        <ul class="nav-topbar">
          <li>
            <a class="icon-link" href="https://www.facebook.com/CathedralCTK/" target="_blank" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/facebook.svg' ?>)"></a>
          </li>
          <li>
            <a class="icon-link" href="https://twitter.com/CathedralCTK" target="_blank" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/twitter.svg' ?>)"></a>
          </li>
          <li>
            <a class="icon-link" href="https://www.instagram.com/CathedralCTK/" target="_blank" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/instagram.svg' ?>)"></a>
          </li>
          <li>
            <?php echo do_shortcode('[gtranslate]'); ?>
          </li>
        </ul>
        <div class="nav-search">
          <?php get_search_form(); ?>
        </div>
        <?php
          if ( has_nav_menu( 'primary_navigation' ) ) :
            wp_nav_menu([
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'theme-location' => 'primary-navigation',
              'menu-class' => 'nav-menu',
              'depth' => '3',
              'walker' => new DPI_Slider_Nav_Walker()
            ]);
          endif;
        ?>
      </div>
    </nav>
  </div>
</div>
