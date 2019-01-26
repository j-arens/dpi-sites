<?php require_once get_template_directory() . '/scripts/php/nav-walker.php'; ?>
<header class="site-header wave-border wave-border__down">
  <div class="container">
    <div class="row">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo col-xs-12 col-xl-4">
        <?php get_template_part('svg/logo-blue') ?>
      </a>
      <nav id="site-nav" class="nav-placeholder col-xs-12 col-xl-8">
          <button class="menu-toggle font-yk">
            Menu
          </button>
          <?php
            wp_nav_menu([
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav-menu',
                'items_wrap' => '
                  <ul id="primary-menu" class="%2$s">
                    %3$s
                    <li class="depth-0 menu-item site-translate_toggle">
                      <a>Español</a>
                      ' . do_shortcode('[dpi_translate langauge="es"]') . '
                    </li>
                    <li class="depth-0 menu-item searchmodal__toggle">
                      ' . file_get_contents(__DIR__ . '/../svg/search.php') . '
                    </li>
                  </ul>',
                'depth' => 3,
                'walker' => new NavWalker()
            ]);
          ?>
      </nav>
    </div>
  </div>
</header>
