<?php

/**
* Cleaner walker for wp_nav_menu()
*
* Walker_Nav_Menu (WordPress default) example output:
*   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
*   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
*
* NavWalker example output:
*   <li class="menu-home"><a href="/">Home</a></li>
*   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
*
*/

class NavWalker extends \Walker_Nav_Menu {

  private $cpt; // Boolean, is current post a custom post type
  private $archive; // Stores the archive page for current URL

  public function __construct() {
    add_filter('nav_menu_css_class', array($this, 'cssClasses'), 10, 2);
    add_filter('nav_menu_item_id', '__return_null');

    $cpt           = get_post_type();
    $this->cpt     = in_array($cpt, get_post_types(array('_builtin' => false)));
    $this->archive = get_post_type_archive_link($cpt);
  }

  public function checkCurrent($classes) {
    return preg_match('/(current[-_])|active/', $classes);
  }

  /**
  * Make a URL relative
  */
  function root_relative_url($input) {
    if (is_feed()) {
      return $input;
    }

    $url = parse_url($input);

    if (!isset($url['host']) || !isset($url['path'])) {
      return $input;
    }

    $site_url = parse_url(network_home_url());  // falls back to home_url

    if (!isset($url['scheme'])) {
      $url['scheme'] = $site_url['scheme'];
    }

    $hosts_match = $site_url['host'] === $url['host'];
    $schemes_match = $site_url['scheme'] === $url['scheme'];
    $ports_exist = isset($site_url['port']) && isset($url['port']);
    $ports_match = ($ports_exist) ? $site_url['port'] === $url['port'] : true;

    if ($hosts_match && $schemes_match && $ports_match) {
      return wp_make_link_relative($input);
    }

    return $input;
  }

  /**
  * Compare URL against relative URL
  */
  public function url_compare($url, $rel) {
    $url = trailingslashit($url);
    $rel = trailingslashit($rel);

    return ((strcasecmp($url, $rel) === 0) || $this->root_relative_url($url) == $rel);
  }

  // @codingStandardsIgnoreStart
  public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    $element->is_subitem = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

    $element->classes[] = 'depth-' . $depth;

    if ($element->is_subitem) {
      foreach ($children_elements[$element->ID] as $child) {
        if ($child->current_item_parent || $this->url_compare($this->archive, $child->url)) {
          $element->classes[] = 'active';
        }
      }
    }

    $element->is_active = (!empty($element->url) && strpos($this->archive, $element->url));

    if ($element->is_active) {
      $element->classes[] = 'active';
    }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }

  // @codingStandardsIgnoreEnd
  public function cssClasses($classes, $item) {
    $slug = sanitize_title($item->title);

    // Fix core `active` behavior for custom post types
    if ($this->cpt) {
      $classes = str_replace('current_page_parent', '', $classes);
      if ($this->url_compare($this->archive, $item->url)) {
        $classes[] = 'active';
      }
    }

    // Remove most core classes
    $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
    $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

    // Re-add core `menu-item` class
    if ($item->type === 'title') {
        $classes[] = 'menu-title';
    } else {
        $classes[] = 'menu-item';
    }

    // Re-add core `menu-item-has-children` class on parent elements
    if ($item->is_subitem) {
      $classes[] = 'menu-item-has-children';
    }

    // Add `menu-<slug>` class
    $classes[] = 'menu-' . $slug;
    $classes = array_unique($classes);
    $classes = array_map('trim', $classes);
    return array_filter($classes);
  }

  public function start_lvl(&$output, $depth = 0, $args = Array()) {
    if ($depth === 0) {
      $output .= '<div class="sub-menu_wrapper"><ul class="sub-menu">';
    } else {
      $output .= '<ul class="sub-menu">';
    }
  }

  public function end_lvl(&$output, $depth = 0, $args = Array()) {
    if ($depth === 0) {
      $output .= '</ul></div>';
    } else {
      $output .= '</ul>';
    }
  }
}

/**
* Clean up wp_nav_menu_args
*
* Remove the container
* Remove the id="" on nav menu items
*/
function nav_menu_args($args = '') {
  $nav_menu_args = [];
  $nav_menu_args['container'] = false;

  if (!$args['items_wrap']) {
    $nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
  }

  if (!$args['walker']) {
    $nav_menu_args['walker'] = new NavWalker();
  }

  return array_merge($args, $nav_menu_args);
}

add_filter('wp_nav_menu_args', __NAMESPACE__ . '\\nav_menu_args');
add_filter('nav_menu_item_id', '__return_null');
