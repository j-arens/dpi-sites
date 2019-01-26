<?php

include_once get_template_directory() . '/lib/Asset.php';
include_once get_template_directory() . '/lib/Assets/JsonManifest.php';
include_once get_template_directory() . '/lib/Template.php';


function template($layout = 'base') {
  return Template::$instances[$layout];
}

function template_part($template, array $context = [], $layout = 'base') {
  extract($context);
  include template($layout)->partial($template);
}

function asset_path($filename) {
  static $manifest;
  isset($manifest) || $manifest = new JsonManifest(get_stylesheet_directory() . '/' . Asset::$dist . '/assets.json');
  return (string) new Asset($filename, $manifest);
}

/**
 * Determine whether to show the sidebar
 */
function display_sidebar() {
  static $display;
  isset($display) || $display = !in_array(true, [
    is_404(),
    is_search(),
    is_front_page(),
    is_page_template('templates/full-width.php'),
    is_page_template('templates/religious-ed.php'),
    is_page_template('templates/sacraments.php'),
    is_page_template('templates/contact.php')
  ]);
  return apply_filters('spine/display_sidebar', $display);
}

/**
 * Page titles
 */
function title() {
  if (is_home()) {
    if ($home = get_option('page_for_posts', true)) {
        return get_the_title($home);
    }
    return __('Latest Posts', 'spine');
  }
  if (is_archive()) {
    return get_the_archive_title();
  }
  if (is_search()) {
    return sprintf(__('Search Results for %s', 'spine'), get_search_query());
  }
  if (is_404()) {
    return __('Not Found', 'spine');
  }
  return get_the_title();
}

/**
* Deep merge arrays
*/
function dpiMergeFields($arr1, $arr2) {
      return array_merge(
          $arr1,
          array_filter($arr2)
      );
  }

/**
* Get social media links
*/
function dpiGetSocialMediaLinks() {
  $contactPage = get_pages([
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/contact.php'
  ])[0];

  $linkDefaults = [
    'facebook' => 'https://www.facebook.com/Christ-The-Redeemer-Catholic-Church-Dawsonville-GA-144673295690879/',
    'twitter' => 'https://twitter.com/CTRCatholic',
    'instagram' => 'https://www.instagram.com/christtheredeemerdawsonville/'
  ];

  $linkFields = [
      'facebook' => get_field('facebook_page_link', $contactPage->ID),
      'twitter' => get_field('twitter_page_link', $contactPage->ID),
      'instagram' => get_field('instagram_page_link', $contactPage->ID)
    ];

  return dpiMergeFields($linkDefaults, $linkFields);
}

function dpiGetSidebarLinks() {
  $homepage = get_pages([
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/front-page.php'
  ])[0];

  $linkDefaults = [
    '#',
    '#',
    '#'
  ];

  $linkFields = [
    get_field('online_giving_button_link', $homepage->ID),
    get_field('daily_reading_button_link', $homepage->ID),
    get_field('join_the_parish_button_link', $homepage->ID)
  ];

  return array_replace($linkDefaults, array_filter($linkFields));
}
