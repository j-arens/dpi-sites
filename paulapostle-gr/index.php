<?php
/**
 * The main template file
*/

get_header(); ?>
<!-- slider -->
<?php
	if (shortcode_exists( 'rev_slider' ) ) {
		$shortcode = get_option( 'opt_page_homepage_slider_textarea_1' );
		if ( $shortcode ) {
			echo do_shortcode( $shortcode );
		} else {
			echo do_shortcode( '[rev_slider alias="home_slider"]' );
		}
	}
?>
<!-- end slider -->

<!-- about -->
<section id="about">
	<div class="container">

		<!-- section info -->
		<?php

			$html = '
				<h2 class="section-title"><strong>' . get_option( 'opt_page_homepage_about_text_2' ) . '</strong></h2>
				<p>' . get_option( 'opt_page_homepage_about_textarea_3' ) . '</p>
			';

			echo $html;
	 	?>
		<!-- end section info -->

		<!-- icon boxes -->
		<?php

			$html = '<ul>';

			// icon box 1
			$img_id = get_option( 'opt_page_homepage_about_image_3' );
			$img_url = wp_get_attachment_image_src( $img_id, 'full' );

			$html .= '
				<li>
					<div class="icon">
						<img src="' . $img_url[0] . '" alt="icon" />
					</div>
					<h3>' . get_option( 'opt_page_homepage_about_text_4' ) . '</h3>
					<p class="info">' . get_option( 'opt_page_homepage_about_textarea_5' ) . '</p>
					<a class="btn" href="' . get_option( 'opt_page_homepage_about_text_7' ) . '">' . get_option( 'opt_page_homepage_about_text_6' ) . '</a>
				</li>
			';

			// icon box 2
			$img_id = get_option( 'opt_page_homepage_about_image_8' );
			$img_url = wp_get_attachment_image_src( $img_id, 'full' );

			$html .= '
				<li>
					<div class="icon">
						<img src="' . $img_url[0] . '" alt="icon" />
					</div>
					<h3>' . get_option( 'opt_page_homepage_about_text_9' ) . '</h3>
					<p class="info">' . get_option( 'opt_page_homepage_about_textarea_10' ) . '</p>
					<a class="btn" href="' . get_option( 'opt_page_homepage_about_text_12' ) . '">' . get_option( 'opt_page_homepage_about_text_11' ) . '</a>
				</li>
			';

			// icon box 3
			$img_id = get_option( 'opt_page_homepage_about_image_13' );
			$img_url = wp_get_attachment_image_src( $img_id, 'full' );

			$html .= '
				<li>
					<div class="icon">
						<img src="' . $img_url[0] . '" alt="icon" />
					</div>
					<h3>' . get_option( 'opt_page_homepage_about_text_14' ) . '</h3>
					<p class="info">' . get_option( 'opt_page_homepage_about_textarea_15' ) . '</p>
					<a class="btn" href="' . get_option( 'opt_page_homepage_about_text_17' ) . '">' . get_option( 'opt_page_homepage_about_text_16' ) . '</a>
				</li>
			';

			$html .= '</ul>';

			echo $html;
	 	?>
		<!-- end icon boxes -->

	</div>
</section>
<!-- end about -->

<!-- news -->
<section id="news">
	<div class="container">
		<h2 class="section-title"><strong>Latest News</strong></h2>
		<?php echo do_shortcode( '[dpi_news_posts layout="homepage_template"]' ); ?>
	</div>
</section>
<!-- end news -->

<!-- events -->
<section id="events">
	<div class="container">
		<h2 class="section-title"><strong>Upcoming Events</strong></h2>
		<?php echo do_shortcode( '[dpi_events_posts layout="homepage_template"]' ); ?>
		<a class="btn" href="/events-archive/">See All Events</a>
	</div>
</section>
<!-- end events -->

<!-- mass times -->
<section id="mass-times">
	<div class="container">
		<h2 class="section-title"><strong>Mass Times</strong></h2>
		<ul>
			<li>
				<img src="/wp-content/themes/dpi-theme-v4/icons/clock.svg" alt="Mass Time" />
				<p class="mass-title"><strong>Coffee and Donuts after...</strong></p>
				<p>5:00 pm</p>
				<p>Oct. 30, 2016</p>
			</li>
			<li>
				<img src="/wp-content/themes/dpi-theme-v4/icons/clock.svg" alt="Mass Time" />
				<p class="mass-title"><strong>Communion Service - Paul K.</strong></p>
				<p>8:30 am</p>
				<p>Oct. 31, 2016</p>
			</li>
			<li>
				<img src="/wp-content/themes/dpi-theme-v4/icons/clock.svg" alt="Mass Time" />
				<p class="mass-title"><strong>All saints day mass</strong></p>
				<p>12:30 pm</p>
				<p>Nov. 1, 2016</p>
			</li>
			<li>
				<img src="/wp-content/themes/dpi-theme-v4/icons/clock.svg" alt="Mass Time" />
				<p class="mass-title"><strong>All saints day mass</strong></p>
				<p>5:30 pm</p>
				<p>Nov. 1, 2016</p>
			</li>
		</ul>
		<a class="btn" href="#">View All Mass Times</a>
	</div>
</section>
<!-- end mass times -->

<!-- daily verse -->
<section id="daily-verse">
	<?php

		$image_id = get_option( 'opt_page_homepage_daily_verse_image_18' );
		$image_url = wp_get_attachment_image_src( $image_id, 'full' );

 	?>
	<div class="image-container" style="background-image: url(<?php echo $image_url[0]; ?>);">
		<div class="container">
			<?php
				if (shortcode_exists( 'hungryfeed' ) ) {
					$shortcode = get_option( 'opt_page_homepage_daily_verse_text_40' );
					if ( $shortcode ) {
						echo do_shortcode( $shortcode );
					} else {
						echo do_shortcode( '[hungryfeed url="https://www.biblegateway.com/votd/get/?format=atom" template="1"]' );
					}
				} else {

					$html = '
						<p>What good will it be for a man if he gains the whole world, yet forfeits his soul? Or what can a man give in exchange for his soul?</p>
						<span class="verse">Matthew 16:26</span>
					';

					echo $html;
				}
			?>
		</div>
	</div>
</section>
<!-- end daily verse -->

<?php get_footer(); ?>