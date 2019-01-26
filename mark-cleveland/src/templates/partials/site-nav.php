<?php
require_once get_template_directory() . '/scripts/php/primary-walker.php';
$search = '
  <li class="menu-item tpl">
     <a class="nav-search" href="/search/">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
     </a>
 </li>
';
?>

<div class="row site-nav-wrap">
  <div class="site-logo col-full-2 col-xw-1">
    <a class="logo" href="<?= esc_url(home_url('/')); ?>"></a>
  </div>
  <nav class="site-nav col-full-10 col-xw-11">
    <button id="mobile-nav-toggle">
      <span class="hamburger"></span>
      Menu
    </button>
    <div class="tpl-menu-wrap">
      <?php
        if ( has_nav_menu( 'primary_navigation' ) ) {
          wp_nav_menu([
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'theme_location' => 'primary_navigation',
            'menu-class' => 'nav-menu',
            'items_wrap' => '<ul id="menu-primary-menu" class="%2$s">%3$s' . $search . '</ul>',
            'depth' => 3,
            'walker' => new DPI_Primary_Nav_Walker()
          ]);
        }
      ?>
    </div>
  </nav>
</div>
