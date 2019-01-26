<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *
 */
?>

<aside id="sidebar" role="complementary">

  <!-- links -->
  <div class="sidebar-main-links">
    <?php

      $html = '
        <a href="' . get_option( 'opt_page_sidebar_link_1_text_48' ) . '" class="link">' . get_option( 'opt_page_sidebar_link_1_text_47' ) . '</a>
        <a href="' . get_option( 'opt_page_sidebar_link_1_text_50' ) . '" class="link">' . get_option( 'opt_page_sidebar_link_1_text_49' ) . '</a>
        <a href="' . get_option( 'opt_page_sidebar_link_1_text_52' ) . '" class="link">' . get_option( 'opt_page_sidebar_link_1_text_51' ) . '</a>
      ';

      echo $html;

    ?>
  </div>
  <!-- end links -->

  <div class="calendar">
    <?php

      if (!is_page(85)) {
        echo '<h1 class="rule">Calendar</h1>';

        if (shortcode_exists( 'calendar' ) ) {
        	$shortcode = get_option( 'opt_page_sidebar_calendar_textarea_53', '[calendar id="88"]' );
          echo do_shortcode( $shortcode );
        }

        $link_title = get_option( 'opt_page_sidebar_calendar_textarea_5399' );
        $link_URL = get_option( 'opt_page_sidebar_calendar_textarea_5499');

        $link = '<a class="btn" href="' . $link_URL . '">' . $link_title . '</a>';

        echo $link;
      } else {

        $html = '
          <div class="mass-times">
            <h1 class="rule">Mass Times</h1>
            <span>' . get_option( 'opt_page_sidebar_mass_times_text_54' ) . '</span>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_55' ) . '</p>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_56' ) . '</p>
            <hr>
            <span>' . get_option( 'opt_page_sidebar_mass_times_text_57' ) . '</span>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_58' ) . '</p>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_59' ) . '</p>
            <hr>
            <span>' . get_option( 'opt_page_sidebar_mass_times_text_60' ) . '</span>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_61' ) . '</p>
            <p>' . get_option( 'opt_page_sidebar_mass_times_text_62' ) . '</p>
            <hr>
          </div>
          ';

          echo $html;

      }

    ?>
  </div>


</aside><!-- #secondary -->
