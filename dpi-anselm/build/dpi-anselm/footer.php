<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
   </div>
<!-- End page wrap -->
    <footer class="site-footer" role="contentinfo">
        <div class="footer-widget-area-wrap">
            <?php //dynamic_sidebar( 'footer_widgets' ); ?>
                <!--    Site info        -->
                <div class="site-info">
                    <p>Made with &hearts; by <a href="http://diocesan.com">Diocesan Publications</a></p>
                </div>
                <a href="#site-header" class="footer-button">
                    <span class="arrow"></span>
                </a>
                <!-- End site-info -->
                <?php dynamic_sidebar('footer_widget'); ?>
        </div>
    </footer>
    <!-- .site-footer -->
    <?php wp_footer(); ?>
        </body>

        </html>