<?php
/**
 * The main template file
*/

get_header(); ?>
<!-- main content -->
<section id="splash">

	<!-- quick info -->
	<div class="info">
		<p><strong>Mass Times</strong><?php echo get_option( 'opt_page_site_info_mass_times_text_area_1' ); ?></p>
		<p><strong>Confession</strong><?php echo get_option( 'opt_page_site_info_confession_text_area_2' ); ?></p>
		<p><strong>Office Hours</strong><?php echo get_option( 'opt_page_site_info_office_hours_text_area_3' ); ?></p>
	</div>
	<!-- end quick info -->

	<!-- link boxes -->
	<div class="link-boxes">

		<!-- link box -->
		<?php

		$img_id = get_option( 'opt_page_link_boxes_link_box_1_image_upload_4' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		// begin link box
		$html = '<div class="link-box">';

		// image link
		$html .= '<a class="site-link fadeInLeft" href="' . get_option( 'opt_page_link_boxes_link_box_1_text_5' ) . '">';
		$html .= '<img src="' . $img_src[0] . '"/>';
		$html .= '</a>';

		// content
		$html .= '<p><strong>' . get_option( 'opt_page_link_boxes_link_box_1_text_6' ) . '</strong></p>';
		$html .= '<ul>';
		$html .= '<li><img src="/wp-content/themes/stpauls-splash/icons/map-marker-white.svg" alt="map-marker" />' . get_option( 'opt_page_link_boxes_link_box_1_text_7' ) . '</li>';
		$html .= '<li><img src="/wp-content/themes/stpauls-splash/icons/phone-white.svg" alt="phone" /><a href="tel:' . get_option( 'opt_page_link_box_1_logo_text_8' ) . '">' . get_option( 'opt_page_link_boxes_link_box_1_text_8' ) . '</a></li>';
		$html .= '</ul>';

		// end link box
		$html .= '</div>';

		echo $html;

	  ?>
		<!-- end link box -->

		<!-- link box -->
		<?php

		$img_id = get_option( 'opt_page_link_boxes_link_box_2_image_upload_9' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );
		// var_dump($img_src);

		// begin link box
		$html = '<div class="link-box">';

		// image link
		$html .= '<a class="site-link fadeInRight" href="' . get_option( 'opt_page_link_boxes_link_box_2_text_10' ) . '">';
		$html .= '<img src="' . $img_src[0] . '"/>';
		$html .= '</a>';

		// content
		$html .= '<p><strong>' . get_option( 'opt_page_link_boxes_link_box_2_text_11' ) . '</strong></p>';
		$html .= '<ul>';
		$html .= '<li><img src="/wp-content/themes/stpauls-splash/icons/map-marker-white.svg" alt="map-marker" />' . get_option( 'opt_page_link_boxes_link_box_2_text_12' ) . '</li>';
		$html .= '<li><img src="/wp-content/themes/stpauls-splash/icons/phone-white.svg" alt="phone" /><a href="tel:' . get_option( 'opt_page_link_box_1_logo_text_8' ) . '">' . get_option( 'opt_page_link_boxes_link_box_2_text_13' ) . '</a></li>';
		$html .= '</ul>';

		// end link box
		$html .= '</div>';

		echo $html;

	  ?>
		<!-- end link box -->

	</div>
	<!-- end link boxes -->

</section>
<!-- end main content -->

<?php get_footer(); ?>