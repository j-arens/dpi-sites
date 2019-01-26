<?php 
  
  require_once get_template_directory() . '/scripts/php/search-nav-walker.php'; 
  
  function quickLinks() {
    $buttons = '';
    $dom = new DOMDocument;

    $quickLinks = wp_nav_menu([
      'menu' => 'search-quick-links',
      'container' => '',
      'container_class' => '',
      'container_id' => '',
      'theme_location' => 'search_quick_links',
      'menu_class' => '',
      'items_wrap' => '<ul class="quick-links">%3$s</ul>',
      'depth' => 1,
      'echo' => false,
      'walker' => new DPI_Search_Walker()
    ]);

    $dom->loadHTML($quickLinks);
    $links = $dom->getElementsByTagName('a');

    $count = 0;
    foreach($links as $link) {
      if ($count < 3) {
        $buttons .= '<a href="' . $link->getAttribute('href') . '" class="button button-primary">' . $link->nodeValue . '</a>';
      }
      $count++;
    }

    print '<ul class="quick-links">' . $buttons . '</ul>';
  }

?>

<header class="site-header container">
  <div class="header-topbar">
    <div class="site-branding">
      <a href="<?= esc_url(home_url('/')); ?>" class="site-logo">
        <span class="logo-diag-bg"></span>
        <span class="logo-img"></span>
      </a>
      <h1 class="site-logo-text">Divine Mercy Parish</h1>
    </div>
    <div class="site-search">
      <button id="search-btn">
        <?php get_template_part('svg/search'); ?>
        <p>Search</p>
      </button>
      <div class="search-overlay">
        <button id="close-site-search">
          <?php get_template_part('svg/close'); ?>
          <p class="maven-pro">Close</p>
        </button>
        <div class="search-wrap">
          <?php 
              get_search_form();
              quickLinks();
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="site-nav-row row">
    <?php get_template_part('partials/site-nav'); ?>
  </div>
</header>