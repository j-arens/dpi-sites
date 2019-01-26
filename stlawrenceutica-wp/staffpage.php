<?php
/*
Template Name: Staff Page 2
*/

get_header();get_sidebar() ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<h1><?php the_title('');?></h1>
	<style>
		.staff-profile{
			display:flex;
			flex-wrap:wrap;
			justify-content:left;
		}
		.profile-image img{max-width:200px;margin-top:30px;}
		.profile-image{width:250px;}
		.profile-info{width:400px;}
	</style>
		<?php
		if( have_rows('staff_member', 'option') ):

			// loop through the rows of data
			while ( have_rows('staff_member', 'option') ) : the_row();?>
			<div class="staff-profile">
				<div class="profile-image"><img src="<?php the_sub_field('staff_image'); ?>" alt="staff photo"></div>
				<div class="profile-info">
					<h3><strong><?php the_sub_field('staff_name');?></strong></h3>
					<strong><i><?php the_sub_field('staff_position');?></i></strong>
					<p><strong>Email:</strong> <?php the_sub_field('staff_email');?><br/>
					<strong>Phone:</strong> <?php the_sub_field('staff_phone');?><br/>
					<strong>Fax:</strong> <?php the_sub_field('staff_fax');?><br/>
					<strong>Description: </strong><br/>
					<?php the_sub_field('staff_bio');?></p>
				</div>
			</div>
			<?php endwhile;
		else :
			// no rows found
		endif;
		?>

	</main><!-- .site-main -->
</div>
<?php get_footer(); ?>
