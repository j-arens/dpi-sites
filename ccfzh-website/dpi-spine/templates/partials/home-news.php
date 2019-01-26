<!-- news -->
<section class="news">
  <div class="container">
    <h1 class="section-title"><?php echo get_option("Title_Text_275"); ?></h1>
    <div class="articles will-animate">
      <?php
        if ( shortcode_exists( 'dpi_news' ) ) {
          echo do_shortcode( '[dpi_news]' );
        } else {
          echo '<div class="no-posts-found">Sorry, there aren\'t any articles to show you at the moment.</div>';
        }
      ?>
    </div>
    <a class="btn btn-primary btn-center" href="/dpi_news/">View All News</a>
  </div>
</section>
<!-- end news -->
