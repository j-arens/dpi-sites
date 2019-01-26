<?php

class DPI_Secondary_Nav_Walker extends Walker_Nav_Menu {

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
    $output .= '<ul class="gl-sub-menu">';
  }

  public function end_lvl( &$output, $depth = 0, $args = Array() ) {
    $output .= '</ul>';
  }

  public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $html = '';
    $current_class = $this->in_array_match( '/(current[-_])|active/', $item->classes ) ? 'current-item' : '';
    $child_class = in_array( 'menu-item-has-children', $item->classes ) ? 'item-has-children' : '';

    if ( !empty( $item->url ) ) {
      $html .= '
        <li class="gl-menu-item ' . ( $depth === 0 ? "gl-tpl " : "gl-child " ) . $current_class . '">
          <a class="' . ( $depth === 0 ? "gl-tpl-link ": "gl-child-link " ) . $child_class . '" href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a>
      ';
    } else {
      $html .= '
       <li class="gl-menu-item ' . ( $depth === 0 ? "gl-tpl " : "gl-child " ) . $current_class . '">
         <span class="' . ( $depth === 0 ? "gl-tpl-title " : "gl-child-title " ) . $child_class . '">' . $item->title . '</span>
     ';
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $html, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $output .= '</li>';
  }
}
