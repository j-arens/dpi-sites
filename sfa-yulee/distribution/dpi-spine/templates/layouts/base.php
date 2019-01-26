<?php
  include_once(get_stylesheet_directory() . '/lib/Template.php');
  include_once(get_stylesheet_directory() . '/scripts/php/helpers.php');
 ?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'spine'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('partials/header');
    ?>
    <div class="wrap" role="document">
      <main class="main">
        <?php load_template(template()->main()); ?>
        <footer class="site-footer">
          <p class="site-copyright">&copy; <?= date('Y') ?> St. Francis of Assisi, Yulee, FL</p>
          <p class="diocesan-link">Hosted by <a href="//diocesan.com">Diocesan</a></p>
        </footer>
      </main>
      <?php if (display_sidebar()) : ?>
        <aside class="sidebar">
          <?php template_part('partials/sidebar'); ?>
        </aside>
      <?php endif; ?>
      <?php
        do_action('get_footer');
        wp_footer();
      ?>
    </div>
  </body>
</html>
