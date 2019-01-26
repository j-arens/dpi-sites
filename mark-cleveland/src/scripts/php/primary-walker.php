<?php

require_once get_template_directory() . '/scripts/php/secondary-walker.php';

class DPI_Primary_Nav_Walker extends Walker_Nav_Menu {

  private $item_count = 1;

  public function in_array_match( $regex, $arr ) {
    if ( !is_array( $arr ) ) {
      trigger_error( 'Arugment 2 must be an array' );
    } else {
      foreach ( $arr as $v ) {
        $match = preg_match( $regex, $v );
        if ( $match === 1 ) {
          return true;
        }
      }
    }
    return false;
  }

  public function start_lvl( &$output, $depth = 0, $args = Array() ) {
    $this->item_count = 1;
    if ( $depth == 0 ) {
      $output .= '
        <div class="sub-menu-wrap depth-1">
          <div class="nav-links-wrap">
      ';
    } else {
      $output .= '<ul class="sub-menu depth-' . ($depth + 1) . '">';
    }
  }

  public function end_lvl( &$output, $depth = 0, $args = Array() ) {
    if ( $depth == 0 ) {
      $global_links = '';

      if ( has_nav_menu( 'global_links' ) ) {
        $global_links = wp_nav_menu([
          'menu' => 'global-links',
          'theme_location' => 'global-links',
          'container' => 'div',
          'container_class' => 'global-links-wrap',
          'container_id' => 'menu-global-links',
          'menu_id' => 'global-links-nav',
          'items_wrap' => '<ul id="%1s" class="%2$s">%3$s</ul>',
          'depth' => 3,
          'echo' => false,
          'walker' => new DPI_Secondary_Nav_Walker()
        ]);
      }

      $output .= '</div>' . $global_links . '</div>';
    } else {
      $output .= '</ul>';
    }
  }

  public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $html = '';

    if ( $depth == 1 ) {
      if ( $this->item_count % 6 == 1 ) {
        $html .= '<ul class="sub-menu sub-menu-column depth-1">';
      }
      $html .= $this->start_li( $depth, $item );
      $this->item_count++;
    } else {
      $html .= $this->start_li( $depth, $item );
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $html, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    if ( $depth == 1 && ($this->item_count - 1) % 6 == 0 ) {
      $output .= '</li></ul>';
    } else {
      $output .= '</li>';
    }
  }

  public function start_li( $depth, $item ) {
    $current_class = $this->in_array_match( '/(current[-_])|active/', $item->classes ) ? 'current-item' : '';
    $child_class = in_array( 'menu-item-has-children', $item->classes ) ? 'item-has-children' : '';

    if ( !empty( $item->url ) ) {
      return '
        <li class="menu-item ' . ($depth === 0 ? "tpl " : "child ") . $current_class . '">
          <a class="' . ($depth === 0 ? "tpl-link " : "child-link ") . $child_class . '" href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a>
      ';
    } else {
      return '
        <li class="menu-item ' . ($depth === 0 ? "tpl " : "child ") . $current_class . '">
          <span class="' . ($depth === 0 ? "tpl-title " : "child-title ") . $child_class . '">' . $item->title . '</span>
      ';
    }
  }
}
