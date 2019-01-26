<footer class="site-footer">
  <!-- container -->
  <div class="container">

    <!-- footer left -->
    <div class="footer-left">
      <?php
        get_template_part( 'partials/footer-links' );
        get_template_part( 'partials/footer-parish-info' );
      ?>
    </div>
    <!-- end footer left -->

    <!-- footer logo -->
    <?php get_template_part( 'partials/footer-logo' ); ?>

    <!-- footer right -->
    <div class="footer-right">
      <?php get_template_part( 'partials/footer-map' ); ?>
    </div>
    <!-- end footer right -->

  </div>
  <!-- end container -->

  <!-- site info -->
  <div class="site-info">
    <p>
      &copy; <?php echo date('Y') ?> St. Mark Parish | Made with &hearts; by <a href="http://diocesan.com">Diocesan Publications</a>
    </p>
  </div>
  <!-- end site info -->

  <a class="back-to-top" href="#header"></a>
</footer>
