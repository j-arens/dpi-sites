<?php

class DPI_Search_Walker extends \Walker_Nav_Menu {

  public function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $html = '';

    $html .= '<a href="' . $item->url . '" class="button button-primary" target="' . $item->target . '">' . $item->title;

    $output .= apply_filters( 'walker_nav_menu_start_el', $html, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    $output .= '</a>';
  }
}