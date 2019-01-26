<?php
/*
Template Name: Homepage
*/

get_header(); ?>
    <div class="slider">
        <?php echo do_shortcode('[rev_slider alias="homeslider"]');?>
    </div>
    <!--  featured links  -->
    <div class="featured-links">
        <div class="link-container">
            <div class="link"> <a href="#">Pray</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="#">Serve</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="#">Learn</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="#">Give</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="http://anselm.diocesanweb.com/register">Register</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="http://anselm.diocesanweb.com/bulletins">Bulletins</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="#">Homilies</a> </div>
        </div>
        <div class="link-container">
            <div class="link"> <a href="http://anselm.diocesanweb.com/contact">Contact</a> </div>
        </div>
    </div>
    <!--  end featured links  -->
    <!--  Page content  -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main>
                <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>
            </main>
            <!-- .site-main -->
        </div>
        <!-- .content-area -->
        <?php get_sidebar(); ?>
        <!--   From the pastor widget     -->
        <?php dynamic_sidebar('pastor_notes'); ?>
        <!--   End pastor widget     -->
    </div>
    <!--  end page content  -->
    <?php get_footer(); ?>