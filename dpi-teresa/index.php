<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dpi-teresa
 */

get_header(); ?>
    <!-- rev slider -->
    <?php echo do_shortcode('[rev_slider alias="home-slider"]'); ?>
    <!-- end rev slider -->

    <!-- upcoming events/links -->
    <section id="home-content">
        <div class="wrapper">
            <div class="upcoming-events">
               <h1>Upcoming Events</h1>
               <?php echo do_shortcode('[homepage_events_posts]'); ?>
            </div>
            <?php echo do_shortcode('[link_boxes]'); ?>
        </div>
    </section>
    <!-- end upcoming events/links -->

     <!-- featued links -->
    <section id="featured-links">
      <?php dynamic_sidebar('featured_links_widget'); ?>
    </section>
    <!-- end featured links -->

<?php
get_footer();
