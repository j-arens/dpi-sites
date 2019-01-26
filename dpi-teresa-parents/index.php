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
       
        <!-- links section -->     
        <section id="links">
            <div class="links-wrap">
                <?php 
            
            $the_query = new WP_Query( array( 'post_type' => 'link-boxes', 'posts_per_page' => 6, 'order' => 'ASC' ) );
            
            //the loop
            if ( $the_query->have_posts() ) {
                $string .= '<div class="link-container">';
                while ( $the_query->have_posts() ) {
		            $the_query->the_post();
                    
                    switch ($the_query->current_post) {
                            
                        case 0:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<a class="link-large" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a>';
                            break;
                            
                        case 1:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<a class="link-medium" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a></div>';
                            break;
                            
                        case 2:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<div class="link-container"><a class="link-medium" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a>';
                            break;
                            
                        case 3:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<a class="link-small" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a>';
                            break;
                            
                        case 4:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<a class="link-small" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a>';
                            break;
                            
                        case 5:
                            $imageURL = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
                            $string .= '<a class="link-medium" href="' . link_box_details_get_meta( 'link_box_details_click_url' ) . '"><span class="title">' . link_box_details_get_meta( 'link_box_details_title' ) . '</span><img class="link-icon" src="'  . $imageURL . '"></a></div>';
                            break;
                    }
                }
            } else {
                //no links
            }
            
            echo $string;
            
            ?> </div>
            <!-- end links wrap -->
        </section>
        <!-- end links section -->
        
        <!-- learning section -->
        <section id="learning-module">
            <div class="content">
                <?php dynamic_sidebar( 'learning_widget' ); ?>
            </div>
        </section>
        <!-- end learning section -->
        
        <!-- important links section -->
        <section id="important-links">
            <h1>Important Links</h1>
            <div class="impt-links-wrapper">
                <?php dynamic_sidebar( 'important_links_widget' ); ?>
            </div>
        </section>
        <!-- end important links section -->
        
        <?php
get_footer();