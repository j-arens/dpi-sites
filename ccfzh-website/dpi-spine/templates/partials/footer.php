<?php

  $row_1_widgets = [
    'footer-our-mission',
    'footer-contact',
    'footer-donate'
  ];

  $row_2_widgets = [
    'footer-partners',
    'footer-newsletter'
  ];

?>

<footer class="site-footer">
  <div class="footer-texture"></div>
  <div class="footer-texture"></div>
  <div class="footer-texture"></div>
  <div class="container">
    <div class="row">
      <?php
        foreach( $row_1_widgets as $widget ) {
          get_template_part( 'partials/' . $widget );
        }
      ?>
    </div>
    <div class="row">
      <?php
        foreach( $row_2_widgets as $widget ) {
          get_template_part( 'partials/' . $widget );
        }
      ?>
    </div>
  </div>
  <div class="site-info">
    <div class="gutter gutter-left"></div>
    <div class="gutter gutter-right"></div>
    <div class="container">
      <p>&copy; Copyright <?php echo date('Y'); ?> Corpus Christi Foundation</p>
      <p>Made with &hearts; by <a href="http://diocesan.com">Diocesan Publications</a></p>
    </div>
  </div>
</footer>
