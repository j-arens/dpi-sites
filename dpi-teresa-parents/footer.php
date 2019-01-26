<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dpi-teresa
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <!-- footer wrap -->  	    
            <div class="footer-wrap">

            <!-- footer widgets --> 
            <div class="footer-widgets">
                <?php dynamic_sidebar( 'footer_widget' ); ?>
            </div>
            <!-- end footer widgets -->
            
            <!-- site info -->
            <div class="site-info">
                <p>&copy; <?php echo date("Y") ?> Mother Teresa of Calcutta Catholic School</p>
                <p>Made with &hearts; by <a href="http://diocesan.com" target="_blank">Diocesan Publications</a></p>
            </div>
            <!-- .site-info -->
            
        </div>
        <!-- end footer wrap -->
		
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
