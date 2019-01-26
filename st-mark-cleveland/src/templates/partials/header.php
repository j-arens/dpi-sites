<header id="header" class="site-header">
  <div class="container">

    <!-- logo -->
    <a class="brand logo-icon" href="<?= esc_url(home_url('/')); ?>"></a>
    <!-- end logo -->

    <!-- site navigation -->
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
    <!-- end site navigation -->

    <!-- hero -->
    <div class="hero"></div>
    <!-- end hero -->

    <a class="to-featured" href="#home-featured"></a>

  </div>
</header>
