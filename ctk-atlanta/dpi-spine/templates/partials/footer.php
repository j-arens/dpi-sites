<?php

  $footer_left_components = [
    'footer-links',
    'footer-contact'
  ];

  $footer_right_components = [
    'footer-map',
    'footer-return'
  ];

?>

<?php 
  if( !is_home() ) {
    get_template_part( 'partials/live-stream-cta' );
  }
?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-left">
      <?php
        foreach($footer_left_components as $component) {
          get_template_part( 'partials/' . $component );
        }
      ?>
    </div>
    <div class="footer-right">
      <?php
        foreach($footer_right_components as $component) {
          get_template_part( 'partials/' . $component );
        }
      ?>
    </div>
  </div>
  <div class="site-info">
    <p>&copy; <?php echo date('Y'); ?> Cathedral of Christ the King | Atlanta, GA</p>
    <p>Made with <i>&hearts;</i> by <a href="http://diocesan.com" target="_blank">Diocesan Publications</a></p>
  </div>
</footer>
