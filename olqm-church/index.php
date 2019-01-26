<?php get_header(); ?><!-- rev slider -->
<?php

if (shortcode_exists( 'rev_slider' ) ) {
	$shortcode = get_option( 'opt_page_homepage_image_slider_textarea_1', '[rev_slider alias="home slider"]' );
	echo do_shortcode( $shortcode );
}

?>
<!-- end rev slider -->

<!-- main links -->
<section id="main-links">
	<?php

		$html = '
			<a class="btn btn-xlg" href="' . get_option( 'opt_page_homepage_main_links_text_4' ) . '">
				<p>' . get_option( 'opt_page_homepage_main_links_text_3' ) . '</p>
				<span>' . get_option( 'opt_page_homepage_main_links_text_2' ) . '</span>
			</a>
			<a class="btn btn-xlg" href="' . get_option( 'opt_page_homepage_main_links_text_7' ) . '">
				<p>' . get_option( 'opt_page_homepage_main_links_text_6' ) . '</p>
				<span>' . get_option( 'opt_page_homepage_main_links_text_5' ) . '</span>
			</a>
			<a class="btn btn-xlg" href="' . get_option( 'opt_page_homepage_main_links_text_10' ) . '">
				<p>' . get_option( 'opt_page_homepage_main_links_text_9' ) . '</p>
				<span>' . get_option( 'opt_page_homepage_main_links_text_8' ) . '</span>
			</a>
		';

		echo $html;

  ?>
</section>
<!-- end main links -->

<!-- church info -->
<section id="church-info">
	<div class="container">

		<!-- church about -->
		<div class="church-about">
			<?php

				// introduction
				$html = '
					<h1 class="rule">' . get_option( 'opt_page_homepage_church_info_text_11' ) . '</h1>
					<p>' . get_option( 'opt_page_homepage_church_info_text_12' ) . '</p>
				';

				// tabs
				$html .= '
					<div id="dpi-tabs-panel">
						<nav>
						<ul>
							<li>' . get_option( 'opt_page_homepage_church_info_text_13' ) . '</li>
							<li>' . get_option( 'opt_page_homepage_church_info_text_17' ) . '</li>
							<li>' . get_option( 'opt_page_homepage_church_info_text_21' ) . '</li>
						</ul>
						<div class="tab-trigger trigger-prev"></div>
						<div class="tab-trigger trigger-next"></div>
						</nav>
						<ul class="tab-container">
						<li class="tab">
							<div class="content-container">
								<span class="content-title">' . get_option( 'opt_page_homepage_church_info_text_14' ) . '</span>
								<p>' . get_option( 'opt_page_homepage_church_info_textarea_15' ) . '</p>
							</div>
						</li>
						<li class="tab">
							<div class="content-container">
								<span class="content-title">' . get_option( 'opt_page_homepage_church_info_text_18' ) . '</span>
								<p>' . get_option( 'opt_page_homepage_church_info_textarea_19' ) . '</p>
							</div>
						</li>
						<li class="tab">
							<div class="content-container">
								<span class="content-title">' . get_option( 'opt_page_homepage_church_info_text_22' ) . '</span>
								<p>' . get_option( 'opt_page_homepage_church_info_textarea_23' ) . '</p>
							</div>
						</li>
						</ul>
					</div>
				';

				echo $html;

		  ?>
		</div>
		<!-- end church about -->

		<!-- featured image -->
			<?php

				$img_1_id = get_option( 'opt_page_homepage_church_info_image_16' );
				$img_1_src = wp_get_attachment_image_src( $img_1_id, 'full' );

				$img_2_id = get_option( 'opt_page_homepage_church_info_image_20' );
				$img_2_src = wp_get_attachment_image_src( $img_2_id, 'full' );

				$img_3_id = get_option( 'opt_page_homepage_church_info_image_24' );
				$img_3_src = wp_get_attachment_image_src( $img_3_id, 'full' );

				$html = '
					<div class="featured-image">
						<img class="active-img" src="' . $img_1_src[0] . '" />
						<img src="' . $img_2_src[0] . '" />
						<img src="' . $img_3_src[0] . '" />
					</div>
				';

				echo $html;

		  ?>
		<!-- end featured image -->

	</div>
	<!-- end container -->
</section>
<!-- end church info -->

<!-- mass times -->
<section id="mass-times" class="short-section">

	<?php

		// background
		$img_id = get_option( 'opt_page_homepage_mass_times_image_25' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		$html = '
		<div class="vslide-bg">
			<div class="bg-img" style="background-image: url(' . $img_src[0] . ');"></div>
			<div class="bg-overlay"></div>
		</div>
		';

		// time slots
		$html .= '
			<div class="container">
				<div class="time-slot">
					<h1 class="rule">' . get_option( 'opt_page_homepage_mass_times_text_26' ) . '</h1>
					<a href="' . get_option( 'opt_page_homepage_mass_times_text_28' ) . '" class="btn">' . get_option( 'opt_page_homepage_mass_times_text_27' ) . '</a>
				</div>
				<div class="time-slot">
					<span>' . get_option( 'opt_page_homepage_mass_times_text_29' ) . '</span>
					<hr>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_30' ) . '</p>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_31' ) . '</p>
				</div>
				<div class="time-slot">
					<span>' . get_option( 'opt_page_homepage_mass_times_text_32' ) . '</span>
					<hr>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_33' ) . '</p>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_34' ) . '</p>
				</div>
				<div class="time-slot">
					<span>' . get_option( 'opt_page_homepage_mass_times_text_35' ) . '</span>
					<hr>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_36' ) . '</p>
					<p>' . get_option( 'opt_page_homepage_mass_times_text_37' ) . '</p>
				</div>
			</div>
		';

		echo $html;
  ?>

</section>
<!-- end mass times -->

<!-- prayer section -->
<section id="prayer-section">
	<div class="container">

	<?php

		// section info
		$html = '
		<div class="prayer-info">
			<h1 class="rule">' . get_option( 'opt_page_homepage_section_info_text_38' ) . '</h1>
			<p>' . get_option( 'opt_page_homepage_section_info_textarea_39' ) . '</p>
		</div>
		';

		echo $html;

		// prayer items
		echo do_shortcode( '[prayer_posts layout="homepage_template"]' );

	?>

	</div>
	<!-- end container -->
</section>
<!-- end prayer section -->

<!-- events section -->
<section id="church-events">
	<!-- container -->
	<div class="container">
		<h1 class="events-title rule">News and Events</h1>
		<a class="btn" href="/news-and-events/">View All</a>

		<!-- event posts -->
		<div class="events-container">

			<!-- featured event -->
			<div class="featured featured-container">
				<?php echo do_shortcode( '[events_posts layout="featured_template"]' ) ?>
			</div>
			<!-- end featured event -->

			<!-- upcoming events -->
			<div class="upcoming upcoming-container">
				<?php echo do_shortcode( '[events_posts layout="upcoming_template"]' ) ?>
			</div>
			<!-- end upcoming events -->

		</div>
		<!-- end event posts -->
	</div>
	<!-- end container -->
</section>
<!-- end events -->

<!-- daily verse -->
<section id="daily-verse" class="short-section">

	<?php
		$img_id = get_option( 'opt_page_homepage_daily_verse_image_41' );
		$img_src = wp_get_attachment_image_src( $img_id, 'full' );

		if (!$img_src) {
			$img_src = '/wp-content/themes/olqm-church/images/scenic-bg.jpg';
		}

		$html =  '
			<div class="vslide-bg">
				<div class="bg-img" style="background-image: url(' . $img_src[0] . ');"></div>
				<div class="bg-overlay"></div>
			</div>
		';

		echo $html;

  ?>

	<div class="container">
		<?php

		if (shortcode_exists( 'hungryfeed' ) ) {
			$shortcode = get_option( 'opt_page_homepage_daily_verse_text_40', '[hungryfeed url="https://www.biblegateway.com/votd/get/?format=atom" template="1"]' );
			echo do_shortcode( $shortcode );
		} else {

			$html = '
				<p>What good will it be for a man if he gains the whole world, yet forfeits his soul? Or what can a man give in exchange for his soul?</p>
				<span class="verse">Matthew 16:26</span>
			';

			echo $html;

		}

		?>
	</div>
</section>
<!-- end daily verse -->

<!-- bulletins -->
<section id="home-bulletins">
	<div class="container">
		<div class="about-bulletins">
			<?php

				$html = '
					<h1 class="rule">' . get_option( 'opt_page_homepage_bulletins_text_42' ) . '</h1>
					<p>' . get_option( 'opt_page_homepage_bulletins_textrea_43' ) . '</p>
					<a class="btn" href="' . get_option( 'opt_page_homepage_bulletins_textrea_436' ) . '">' . get_option( 'opt_page_homepage_bulletins_textrea_435' ) . '</a>
				';

				echo $html;

		  ?>
		</div>

			<?php

				function bulletins_encrypt_link( $bulletinId, $sunday, $is_pdf ) {
					$bulletinsOnline = "http://bulletins.discovermass.com";
					$timestamp = time();
					$key = pack( "H*", "69F693BA89D7224C932A292D14A6262813DA4B443A95F233DBB25E132B4E7E8F" );
					$key_size  = strlen( $key );
					$iv_size = mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC );
					$iv = mcrypt_create_iv( $iv_size, MCRYPT_RAND );
					$plaintext = "{$bulletinId}|{$sunday}|{$timestamp}";
					$ciphertext = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $key, $plaintext, MCRYPT_MODE_CBC, $iv );
					$ciphertext = rawurlencode( base64_encode( $iv . $ciphertext ) );
					$pdf = ( $is_pdf ) ? "{$bulletinsOnline}/download.php?bulletin={$ciphertext}" : "{$bulletinsOnline}/image.php?bulletin={$ciphertext}";
					return $pdf;
				}

				function get_bulletins($id, $vol) {
					$bulletin_id = $id;
					$volume = $vol;
			    $counter = 1;
			    $bulletinList = array();

					// Get the list of bulletins
					$bulletins = json_decode( file_get_contents( "http://bulletins.discovermass.com/list.php?folder={$bulletin_id}&quantity={$volume}" ) );

					// Loop through the bulletins
					foreach( $bulletins as $date => $bulletin ) {
						$file = bulletins_encrypt_link( $bulletin_id, $date, true );
			    	$image = bulletins_encrypt_link( $bulletin_id, $date, false );
						$label = date( "M j, Y", strtotime( $date ) );

			      $bulletinList['bulletin_' . $counter] = array(
			        'file_url' => $file,
			        'image_url' => $image,
			        'date' => $label,
			      );
			      $counter++;
					}
			    return $bulletinList;
				}

				$bulletins = get_bulletins(27423346, 2);

				$html = '<ul class="bulletin-list">';

				foreach( $bulletins as $bulletin ) {

					$html .= '
						<li class="bulletin">
							<a href="' . $bulletin['file_url'] . '" class="pop-up" target="_blank">
								<div class="image-container" style="background-image: url(' . $bulletin['image_url'] . ')">
										<div class="message-overlay">
											<span>
												<p>Read More</p>
												<p class="bulletin-date">' . $bulletin['date'] . '</p>
											</span>
										</div>
								</div>
							</a>
						</li>
					';
				}

				$html .= '</ul>';

				echo $html;

		 	?>

	</div>
</section>
<!-- end bulletins -->

<!-- promo section -->
<section id="promo" class="cta">
	<div class="container">
		<?php

			$html = '
				<p>' . get_option( 'opt_page_homepage_promo_textarea_44' ) . '</p>
				<a href="' . get_option( 'opt_page_homepage_promo_text_46' ) . '" class="promo-btn">' . get_option( 'opt_page_homepage_promo_text_45' ) . '</a>
			';

			echo $html;

	  ?>
	</div>
</section>
<!-- end promo section -->

<?php get_footer(); ?>