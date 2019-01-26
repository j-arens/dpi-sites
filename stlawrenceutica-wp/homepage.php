<?php
/*
Template Name: Homepage
*/

get_header(); ?>
<div class="slider">
<?php echo do_shortcode('[rev_slider alias="homeslider"]');?>
</div>
<div class="featured-area">
	<div class="feature-one feature">
	<h3>Mass Times</h3>
		<div class="field-wrapper">
			<?php if( have_rows('mass_times', 'option') ):
				while ( have_rows('mass_times', 'option') ) : the_row();?>
			<p><strong><?php the_sub_field('mass_day');?></strong> : <?php the_sub_field('mass_time');?></p>
			<?php 	endwhile;	else:	endif;	?>
		</div>
		<br/><a class="button" href="#">Full Schedule</a><br/>
	</div>
	<div class="feature-two feature">
		<h3>Welcome</h3>
		<div class="field-wrapper">
			<p><?php the_field('welcome_message', 'option');?></p>
		</div>
		<br/><a class="button" href="#">Sign Up</a><br/>
	</div>
	<div class="feature-three feature">
		<h3>Upcoming Events</h3>
		<div class="field-wrapper">
			<p><?php the_field('last_featured_area', 'option');?></p>
		</div>
		<br/><a class="button" href="http://theme.diocesanweb.com/news-events/">Learn More</a><br/>
	</div>
</div>
<div id="content" class="site-content">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
