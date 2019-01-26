<?php
class DPI_Primary_Walker extends \Walker_Nav_Menu {

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
    $output .= '';
  }

  public function end_lvl( &$output, $depth = 0, $args = Array() ) {
    $output .= '';
  }

  public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $html = '';
    $current_class = $this->in_array_match( '/(current[-_])|active/', $item->classes ) ? 'current-item' : '';
    $child_class = in_array( 'menu-item-has-children', $item->classes ) ? 'item-has-children' : '';

    if ($depth === 0) {
        $html .= '
            <li class="menu-item tpl ' . $current_class . '">
                <span class="tpl-title">' . $item->title . '</span>
        ';
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $html, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $output .= '</li>';
  }
}