<?php
/**
 * The main template file
*/

get_header(); ?>
<!-- rev slider -->
<?php

if (shortcode_exists( 'rev_slider' ) ) {
	$shortcode = get_option( 'opt_page_homepage_slider_shortcode_text_701' );
	if ( $shortcode.length ) {
		echo do_shortcode( $shortcode );
	} else {
		echo do_shortcode( '[rev_slider alias="home-slider"]' );
	}
}

?>
<!-- end rev slider -->

<!-- church news -->
<?php

	$img_id = get_option( 'opt_page_homepage_background_iamge_image_300' );
	$img_src = wp_get_attachment_image_src( $img_id, 'full' );

?>
<section id="church-news">
	<div class="background" style="background-image: url('<?php echo $img_src[0] ?>');"></div>
	<div class="overlay bg-primary"></div>
	 <div class="container">
	 		<div class="card card-lg">
	 			<h1 class="color-primary"><?php echo get_option( 'opt_page_homepage_section_title_text_14' ); ?></h1>

				<?php echo do_shortcode( '[event-posts layout="homepage_template"]' ); ?>

				<a class="btn" href="<?php echo get_option( 'opt_page_homepage_button_link_text_15' ) ?>"><?php echo get_option( 'opt_page_homepage_button_link_text_16' ); ?></a>
	 		</div>
			<!-- end card -->
	 </div>
	 <!-- end container -->
</section>
<!-- end church news -->

<!-- chuch info -->
<section id="church-info">
	<div class="container">

		<!-- icon box -->

		<?php

		// icon box 1
		$img_id = get_option( 'opt_page_homepage_icon_box_1_image_17' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html = '
			<div class="card icon-box">
				<h1 class="color-primary">' . get_option( 'opt_page_homepage_icon_box_1_text_18' ) . '</h1>
				<img src="' . $img_src[0] . '" />
				<span class="content">
					<p>' . get_option( 'opt_page_homepage_icon_box_1_text_19' ) . '</p>
					<br />
				</span>
				<span class="content">
					<p>' . get_option( 'opt_page_homepage_icon_box_1_text_20' ) . '</p>
					<br />
				</span>
				<span class="content">
					<p>' . get_option( 'opt_page_homepage_icon_box_1_text_21' ) . '</p>
					<br />
				</span>
				<a class="btn btn-bottom" href="' . get_option( 'opt_page_homepage_icon_box_1_text_23' ) . '">' . get_option( 'opt_page_homepage_icon_box_1_text_22' ) . '</a>
			</div>
		';

		echo $html;

		?>

		<!-- end icon box -->

		<!-- icon box -->

		<?php

		// icon box 2
		$img_id = get_option( 'opt_page_homepage_icon_box_2_image_24' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );
		$rss_feed = do_shortcode( '[hungryfeed url="http://usccb.org/bible/readings/rss/" feed_fields="" item_fields="title,description,author" truncate_description="150" date_format="F j, Y" max_items="1" template="1"]' );

		$html = '
			<div class="card icon-box">
				<h1 class="color-primary">' . get_option( 'opt_page_homepage_icon_box_2_text_25' ) . '</h1>
				<img src="' . $img_src[0] . '" />
				<span class="content">' . $rss_feed . '</span>
				<a class="btn btn-bottom" href="' . get_option( 'opt_page_homepage_icon_box_2_text_27' ) . '" target="_blank">' . get_option( 'opt_page_homepage_icon_box_2_text_26' ) . '</a>
			</div>
		';

		echo $html;

	 	?>

		<!-- end icon box -->

		<!-- icon box -->

		<?php

		// icon box 3
		$img_id = get_option( 'opt_page_homepage_icon_box_3_image_28' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html = '
			<div class="card icon-box">
				<h1 class="color-primary">' . get_option( 'opt_page_homepage_icon_box_3_text_29' ) . '</h1>
				<img src="' . $img_src[0] . '" />
				<span class="content">
					<h4>Mass</h4>
					<p>September 19, 2016 | 7:00 am</p>
					<br />
				</span>
				<span class="content">
					<h4>Mass</h4>
					<p>September 19, 2016 | 9:00 am</p>
					<br />
				</span>
				<span class="content">
					<h4>Prayer Meeting</h4>
					<p>September 19, 2016 | 7:00 pm</p>
					<br />
				</span>
				<a class="btn btn-bottom" href="' . get_option( 'opt_page_homepage_icon_box_3_text_31' ) . '">' . get_option( 'opt_page_homepage_icon_box_3_text_30' ) . '</a>
			</div>
		';

		echo $html;

		?>

		<!-- end icon box -->

	</div>
	<!-- end container -->

</section>
<!-- end church info -->

<!-- important links -->
<section id="important-links">
	<div class="container">

		<!-- saint of the day -->

		<?php
			$rss_feed = do_shortcode( '[hungryfeed url="http://feeds.feedburner.com/catholicnewsagency/saintoftheday" feed_fields="" item_fields="title,description,author" link_target=”_blank” truncate_description="500" max_items="1"]' );

			$html = '
				<div class="card card-md">
					<h1>' . get_option( 'opt_page_homepage_saint_of_the_day_text_32' ) . '</h1>
					' . $rss_feed . '
					<a class="btn" href="' . get_option( 'opt_page_homepage_saint_of_the_day_text_34' ) . '">' . get_option( 'opt_page_homepage_saint_of_the_day_text_33' ) . '</a>
				</div>
			';

			echo $html;

	 	?>

		<!-- end saint of the day -->

		<!-- vatican news -->

		<?php
			$rss_feed = do_shortcode( '[hungryfeed url="http://www.news.va/en/rss.xml" feed_fields=”” item_fields="date,title" link_target=”_blank” date_format="m-d-Y" max_items="3"]' );

			$html = '
				<div class="card card-md">
					<h1>' . get_option( 'opt_page_homepage_vatican_news_text_35' ) . '</h1>
					' . $rss_feed . '
					<a class="btn" href="' . get_option( 'opt_page_homepage_vatican_news_text_37' ) . '" target="_blank">' . get_option( 'opt_page_homepage_vatican_news_text_36' ) . '</a>
				</div>
			';

			echo $html;

	  ?>

		<!-- end vatican news -->

	</div>
	<!-- end container -->
</section>
<!-- end important links -->

<?php get_footer(); ?>