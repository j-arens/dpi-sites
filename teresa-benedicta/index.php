<?php
/**
 * The main template file
*/

get_header(); ?>
<!-- slider -->
<?php
	if (shortcode_exists( 'rev_slider' ) ) {
		$shortcode = get_option( 'opt_page_homepage_slider_textarea_1', '[rev_slider alias="home_slider"]' );
		echo do_shortcode( $shortcode );
	}
?>
<!-- end slider -->

<!-- about -->
<section id="about">
	<div class="container">
		<h4 class="section-title">Welcome</h4>
		<p>
			Welcome to St. Teresa Benedicta of the Cross. We are a Roman Catholic Parish that serves the northeastern part of Dearborn County, Indiana. Our church is located in Bright, Indiana which is just northwest of Cincinnati, Ohio. Our parish was founded in 2000 and we have quickly grown in size. Our hope is that this website helps not only our parishioners, but anyone who might be interested in learning more about the Catholic faith.
		</p>
		<p>
			Interested in making a donation to St. Teresa’s “Build Our Church Fund?” Donations can be made many different ways. Pay by cash or check and drop it in the collection basket at Mass, or drop it to the parish office. If we are not open, you can put it in the black drop box located in our parking lot. Want to make a donation from the comfort of your home? We offer online giving as well! Go to <a href="stteresab.weshareonline.org">stteresab.weshareonline.org</a> and click on the button for the Build Our Church Fund. We accept Credit and Debit cards online or you can make a payment from your checking account. Thank you for supporting our parish!
		</p>
	</div>
</section>
<!-- end about -->

<!-- mass times -->
<section id="mass-times">
	<div class="container">
		<h4 class="section-title">Mass Times</h4>
		<ul>
			<li>
				<strong>Weekend Masses</strong>
				<hr>
				<p>
					Saturday - 4:30 pm
				</p>
				<p>
					Sunday - 8:30 am and 11:00 am
				</p>
			</li>
			<li>
				<strong>Weekend Masses</strong>
				<hr>
				<p>
					Tues., Weds., Thurs. - 6:00 pm
				</p>
				<p>
					Friday, Saturday - 8:30 am
				</p>
			</li>
			<li>
				<strong>Confession</strong>
				<hr>
				<p>
					Confessions are heard Tuesday, Thursday, and Saturday 30 minutes prior to the start of Mass, ending 10 minutes prior to Mass. Confessions also available by appointment.
				</p>
			</li>
			<li>
				<strong>Adoration and Benedication</strong>
				<hr>
				<p>
					Adoration takes place every Wednesday beginning at noon and concludes with Benediction at 5:40.
				</p>
			</li>
		</ul>
	</div>
</section>
<!-- end mass times -->

<!-- bulletins -->
<section id="bulletins">
	<div class="container">
		<h4 class="section-title">Bulletins</h4>
		<?php echo do_shortcode( '[bulletins]' ); ?>
	</div>
</section>
<!-- end bulletins -->

<!-- contact -->
<section id="contact">
	<!-- <div class="form-container">
		<form id="contact-form">
			<label>
				<p>Your Name</p>
				<input type="text">
			</label>
			<label>
				<p>Phone Number</p>
				<input type="tel">
			</label>
			<label>
				<p>Your Email</p>
				<input type="text">
			</label>
			<label>
				<p>How can we help you?</p>
				<textarea></textarea>
			</label>
			<input class="btn" type="submit" value="Submit">
		</form>
	</div> -->
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3091.3960810563262!2d-84.86297708418064!3d39.211169279523396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88402b546a696a2d%3A0x1f3e45a026dd81aa!2sSt+Teresa+Benedicta-The+Cross!5e0!3m2!1sen!2sus!4v1479224880525" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<!-- end contact -->

<?php get_footer(); ?>