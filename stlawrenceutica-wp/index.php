<?php
/**
 * The main template file
*/

get_header(); ?><div id="homepage">
<?php echo do_shortcode('[rev_slider alias="home-slider"]'); ?>

<!-- mission statement -->
<section id="mission-statement">
  <div class="wrapper">
    <h1><?php echo get_option( 'opt_page_mission_statement_text_field_0' ); ?></h1>
    <p class="heading-italic">
      <?php echo get_option( 'opt_page_mission_statement_textarea_1' ); ?>
    </p>
    <a class="btn-large btn-link" href="<?php echo get_option( 'opt_page_mission_statement_text_field_3' ); ?>"><?php echo get_option( 'opt_page_mission_statement_text_field_2' ); ?></a>
  </div>
</section>
<!-- end mission statement -->

<!-- link boxes -->
<section id="link-boxes">
  <div class="small-link-box-container">
    <!-- link box -->
    <?php
      // get background image
      $bg_img_ID = get_option( 'opt_page_small_link_box_0_bg_image_0' );
      $bg_img_SRC = wp_get_attachment_image_src($bg_img_ID, 'full');

      // get backround color
      $bg_color = get_option( 'opt_page_small_link_color_picker_0' );

      // get icon
      $icon_img_ID = get_option( 'opt_page_small_link_box_0_icon_image_1' );
      $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(64, 64));

      // link box container
      $html = '<div class="link-box link-box-small" style="background-image: url(' . $bg_img_SRC[0] . ')">';

      // color overlay
      $html .= '<div class="link-box-overlay" style="background: ' . $bg_color . '"></div>';

      // idle state
      $html .= '<div class="content idle-state">';
      $html .= '<img class="link-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
      $html .= '<h1 class="white-text">' . get_option( 'opt_page_small_link_box_0_title_2' ) . '</h1>';
      $html .= '</div>';
      // end idle state

      // hover state
      $html .= '<div class="content hover-state">';
      $html .= '<h3 class="white-text masstime-day">' . get_option( 'opt_page_small_link_box_0_text_10' ) . '</h3>';
      $html .= '<p class="white-text masstime">' . get_option( 'opt_page_small_link_box_0_textarea_11' ) . '</p>';
      $html .= '<h3 class="white-text masstime-day">' . get_option( 'opt_page_small_link_box_0_text_12' ) . '</h3>';
      $html .= '<p class="white-text masstime">' . get_option( 'opt_page_small_link_box_0_textarea_13' ) . '</p>';
      $html .= '<a class="btn-large btn-link btn-white" href="' . get_option( 'opt_page_small_link_box_0_text_5' ) . '">' . get_option( 'opt_page_small_link_box_0_text_4' ) . '</a>';
      $html .= '</div>';
      // end hover state

      $html .= '</div>';
      // end link box container

      echo $html;
    ?>
    <!-- end link box -->

    <!-- link box -->
    <?php
      // get background image
      $bg_img_ID = get_option( 'opt_page_small_link_box_1_bg_image_0' );
      $bg_img_SRC = wp_get_attachment_image_src($bg_img_ID, 'full');

      // get backround color
      $bg_color = get_option( 'opt_page_small_link_box_1_color_picker_1' );

      // get icon
      $icon_img_ID = get_option( 'opt_page_small_link_box_1_icon_image_2' );
      $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(64, 64));

      // link box container
      $html = '<div class="link-box link-box-small" style="background-image: url(' . $bg_img_SRC[0] . ')">';

      // color overlay
      $html .= '<div class="link-box-overlay" style="background: ' . $bg_color . '"></div>';

      // idle state
      $html .= '<div class="content idle-state">';
      $html .= '<img class="link-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
      $html .= '<h1 class="white-text">' . get_option( 'opt_page_small_link_box_1_title_3' ) . '</h1>';
      $html .= '</div>';
      // end idle state

      // hover state
      $html .= '<div class="content hover-state">';
      $html .= '<p class="white-text"><strong>' . get_option( 'opt_page_small_link_box_1_textarea_4' ) . '</strong></p>';
      $html .= '<a class="btn-large btn-link btn-white" href="' . get_option( 'opt_page_small_link_box_1_text_6' ) . '">' . get_option( 'opt_page_small_link_box_1_text_5' ) . '</a>';
      $html .= '</div>';
      // end hover state

      $html .= '</div>';
      // end link box container

      echo $html;
    ?>
    <!-- end link box -->
  </div>
  <!-- end container -->
  <div class="large-link-box-container">
    <!-- link box -->
    <!-- link box -->
    <?php
      // get background image
      $bg_img_ID = get_option( 'opt_page_large_link_box_0_bg_image_0' );
      $bg_img_SRC = wp_get_attachment_image_src($bg_img_ID, 'full');

      // get backround color
      $bg_color = get_option( 'opt_page_large_link_box_0_color_picker_1' );

      // get icon
      $icon_img_ID = get_option( 'opt_page_large_link_box_0_icon_image_2' );
      $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(64, 64));

      // link box container
      $html = '<div class="link-box link-box-big" style="background-image: url(' . $bg_img_SRC[0] . ')">';

      // color overlay
      $html .= '<div class="link-box-overlay" style="background: ' . $bg_color . '"></div>';

      // idle state
      $html .= '<div class="content idle-state">';
      $html .= '<img class="link-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
      $html .= '<h1 class="white-text">' . get_option( 'opt_page_large_link_box_0_title_3' ) . '</h1>';
      $html .= '</div>';
      // end idle state

      // hover state
      $html .= '<div class="content hover-state">';
      $html .=  do_shortcode('[homepage-post]');
      $html .= '<a class="btn-large btn-link btn-white" href="' . get_option( 'opt_page_large_link_box_0_text_6' ) . '">' . get_option( 'opt_page_large_link_box_0_text_5' ) . '</a>';
      $html .= '</div>';
      // end hover state

      $html .= '</div>';
      // end link box container

      echo $html;
    ?>
    <!-- end link box -->

  </div>
  <!-- end link box container -->
</section>
<!-- end link boxes -->

<!-- icon boxes -->
<section id="icon-boxes">
  <!-- icon box -->
  <?php

    // get icon
    $icon_img_ID = get_option( 'opt_page_icon_box_0_icon_0' );
    $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(128, 128));

    // icon box container
    $html = '<div class="icon-box">';

    // icon box content
    $html .= '<a class="icon-link" href="' . get_option( 'opt_page_icon_box_0_text_4' ) . '">';
    $html .= '<img class="icon-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
    $html .= '</a>';
    $html .= '<h1>' . get_option( 'opt_page_icon_box_0_text_1' ) . '</h1>';
    $html .= '<p>' . get_option( 'opt_page_icon_box_0_textarea_2' ) . '</p>';
    $html .= '<a class="btn-large btn-link" href="' . get_option( 'opt_page_icon_box_0_text_4' ) . '">' . get_option( 'opt_page_icon_box_0_text_3' ) . '</a>';

    // end icon box
    $html .= '</div>';

    echo $html;

  ?>
  <!-- end icon box -->

  <!-- icon box -->
  <?php

    // get icon
    $icon_img_ID = get_option( 'opt_page_icon_box_1_icon_0' );
    $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(128, 128));

    // icon box container
    $html = '<div class="icon-box">';

    // icon box content
    $html .= '<a class="icon-link" href="' . get_option( 'opt_page_icon_box_1_text_4' ) . '">';
    $html .= '<img class="icon-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
    $html .= '</a>';
    $html .= '<h1>' . get_option( 'opt_page_icon_box_1_text_1' ) . '</h1>';
    $html .= '<p>' . get_option( 'opt_page_icon_box_1_textarea_2' ) . '</p>';
    $html .= '<a class="btn-large btn-link" href="' . get_option( 'opt_page_icon_box_1_text_4' ) . '">' . get_option( 'opt_page_icon_box_1_text_3' ) . '</a>';

    // end icon box
    $html .= '</div>';

    echo $html;

  ?>
  <!-- end icon box -->

  <!-- icon box -->
  <?php

    // get icon
    $icon_img_ID = get_option( 'opt_page_icon_box_2_icon_0' );
    $icon_img_SRC = wp_get_attachment_image_src($icon_img_ID, array(128, 128));

    // icon box container
    $html = '<div class="icon-box">';

    // icon box content
    $html .= '<a class="icon-link" target="_blank" href="' . get_option( 'opt_page_icon_box_2_text_4' ) . '">';
    $html .= '<img class="icon-box-icon" src="' . $icon_img_SRC[0] . '" alt="icon" />';
    $html .= '</a>';
    $html .= '<h1>' . get_option( 'opt_page_icon_box_2_text_1' ) . '</h1>';
    $html .= '<p>' . get_option( 'opt_page_icon_box_2_textarea_2' ) . '</p>';
    $html .= '<a class="btn-large btn-link" target="_blank" href="' . get_option( 'opt_page_icon_box_2_text_4' ) . '">' . get_option( 'opt_page_icon_box_2_text_3' ) . '</a>';

    // end icon box
    $html .= '</div>';

    echo $html;

  ?>
  <!-- end icon box -->
</section>
<!-- end icon boxes -->

</div>
<?php get_footer(); ?>