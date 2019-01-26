<?php
/**
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

// get settings set in customizer and pass to js
 $general_settings['font'] = array(
	 'primaryFont' => get_option( 'opt_page_typography_font_text_100' ),
	 'secondaryFont' => get_option( 'opt_page_typography_font_text_101' ),
   'headings' => array(
     'h1' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_105' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_106' ),
     ),
     'h2' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_107' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_108' ),
     ),
     'h3' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_109' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_110' ),
     ),
     'h4' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_111' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_112' ),
     ),
     'h5' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_113' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_114' ),
     ),
     'h6' => array(
       'size' => get_option( 'opt_page_typography_heading_sizes_text_115' ),
       'weight' => get_option( 'opt_page_typography_heading_sizes_select_116' ),
     ),
   ),
   'body' => array(
     'paragraph' => array(
       'size' => get_option( 'opt_page_typography_body_text_sizes_text_117' ),
       'weight' => get_option( 'opt_page_typography_body_text_sizes_select_118' ),
     ),
     'anchor' => array(
       'size' => get_option( 'opt_page_typography_body_text_sizes_text_119' ),
       'weight' => get_option( 'opt_page_typography_body_text_sizes_select_120' ),
     ),
   ),
 );

 $general_settings['color'] = array(
   'primaryColor' => get_option( 'opt_page_color_primary_color_text_102' ),
   'secondaryColor' => get_option( 'opt_page_color_secondary_color_text_103' ),
   'neutralColor' => get_option( 'opt_page_color_neutral_color_text_105' ),
   'baseColor' => get_option( 'opt_page_color_base_color_text_106' ),
   'headingColor' => get_option( 'opt_page_typography_heading_text_color_color_102' ),
   'bodyColor' => get_option( 'opt_page_typography_body_text_color_color_103' ),
   'linkColor' => get_option( 'opt_page_typography_link_text_color_color_104' ),
 );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script> var _$ite_$ettings = <?php echo json_encode($general_settings); ?>; </script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Full page wrapper -->
<div id="page" class="site">
	<!-- Header -->
	<header id="masthead" class="site-header bg-secondary" role="banner">

		<!-- doves -->
    <div class="dove-container">
      <img class="dove dove-fl" src="/wp-content/themes/stpauls-church/images/dove-fl.png" alt="dove" />
  		<img class="dove dove-l" src="/wp-content/themes/stpauls-church/images/dove-l.png" alt="dove" />
  		<img class="dove dove-c" src="/wp-content/themes/stpauls-church/images/dove-c.png" alt="dove" />
  		<img class="dove dove-r" src="/wp-content/themes/stpauls-church/images/dove-r.png" alt="dove" />
  		<img class="dove dove-fr" src="/wp-content/themes/stpauls-church/images/dove-fr.png" alt="dove" />
    </div>
		<!-- end doves -->

		<!-- social links bar -->
		<?php

		$html = '<ul class="social-links">';

		// address
		$img_id = get_option( 'opt_page_social_links_address_image_0' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html .= '<li><a href="/church/contact/"><img src="' . $img_src[0] . '"/><p class="color-neutral">' . get_option( 'opt_page_social_links_address_text_1' ) . '</p></a></li>';

		// phone number
		$img_id = get_option( 'opt_page_social_links_phone_number_image_2' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html .= '<li><img src="' . $img_src[0] . '"/><a class="color-neutral" href="tel:' . get_option( 'opt_page_social_links_phone_number_text_3' ) . '">' . get_option( 'opt_page_social_links_phone_number_text_3' ) . '</a></li>';

		// social link 1
		$img_id = get_option( 'opt_page_social_links_facebook_image_4' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html .= '<li><img src="' . $img_src[0] . '"/><a class="color-neutral" href="' . get_option( 'opt_page_social_links_facebook_text_5' ) . '" target="_blank">' . get_option( 'opt_page_social_links_facebook_text_6' ) . '</a></li>';

		// social link 2
		$img_id = get_option( 'opt_page_social_links_my_parish_app_image_7' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html .= '<li><img src="' . $img_src[0] . '"/><a class="color-neutral" href="' . get_option( 'opt_page_social_links_my_parish_app_text_8' ) . '" target="_blank">' . get_option( 'opt_page_social_links_my_parish_app_text_9' ) . '</a></li>';

		$html .= '</ul>';

		echo $html;

	  ?>
		<!-- end social links bar -->

		<!-- site branding -->
		<div class="container-half logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
				<?php

				$img_id = get_option( 'opt_page_logo_site_logo_image_10' );
				$img_src = wp_get_attachment_image_src( $img_id, 'full' );

				echo '<img src="' . $img_src[0] . '" alt="site logo" />';

				?>
			</a>
		</div>
		<!-- end site branding -->

		<!-- church info -->
		<?php

    $html = '
      <div class="container-half church-info">
        <ul>
          <li><h1>Mass Times</h1><p class="color-neutral">' . get_option( 'opt_page_church_info_mass_times_textarea_11' ) . '</p></li>
          <li><h1>Confession</h1><p class="color-neutral">' . get_option( 'opt_page_church_info_confession_textarea_12' ) . '</p></li>
          <li><h1>Office Hours</h1><p class="color-neutral">' . get_option( 'opt_page_church_info_office_hours_textarea_13' ) . '</p></li>
        </ul>
      </div>
    ';

		echo $html;

	  ?>
		<!-- end church info -->

   <!-- site navigation -->
    <nav id="site-navigation" data-breakpoint="1150">
        <!-- mobile nav toggle -->
        <div class="menu-toggle">
            <span class="toggle-btn"></span>
        </div>
        <!-- end mobile nav toggle -->
        <!-- wp menu -->
        <div class="menu bg-primary">
            <?php

                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class' => '',
                        'container' => '',
                        'depth' => 3,
                    ) );
                }

                get_search_form();
            ?>
        </div>
        <!-- End wp menu -->
    </nav>
    <!-- End nav -->
	</header>
	<!-- End header -->

<!-- Begin site content -->
	<div id="content" class="site-content <?php echo trim( wp_title('') ) ?>">
