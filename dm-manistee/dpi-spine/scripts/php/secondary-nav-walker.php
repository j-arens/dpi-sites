<?php

class DPI_Secondary_Walker extends \Walker_Nav_Menu {

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
      $output .= '<ul class="sub-menu-depth-'. ($depth + 1) .'">';
  }

  public function end_lvl( &$output, $depth = 0, $args = Array() ) {
      $output .= '</ul>';
  }

  public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $html = '';
    $current_class = $this->in_array_match( '/(current[-_])|active/', $item->classes ) ? 'current-item' : '';
    $child_class = in_array( 'menu-item-has-children', $item->classes ) ? 'item-has-children' : '';

    // output a ul for top level items without children so the formatting and spacing can look nice
    if ($depth === 0 && !in_array( 'menu-item-has-children', $item->classes )) {
        $html .= '<div class="sub-menu-placeholder"></div>';
    }

    if ($depth > 0) {
        if (!empty($item->url)) {
            $html .= '
                <li class="menu-item child-item">
                    <a class="child-link ' . ($depth === 1 ? $child_class : "") . '" href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a>
            ';
        } else {
            $html .= '
                <li class="menu-item child-item">
                    <span class="child-title ' . ($depth === 1 ? $child_class : "") . ($item->classes[0] === "nav-search-btn" ? "nav-search-btn" : '') . '">' . $item->title . '</span>
            ';
        }
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $html, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    if ($depth > 0) {
      $output .= '</li>';
    }
  }
}