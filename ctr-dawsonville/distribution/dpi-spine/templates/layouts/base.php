<?php
  include_once(get_stylesheet_directory() . '/lib/Template.php');
  include_once(get_stylesheet_directory() . '/scripts/php/helpers.php');
 ?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>

    <!-- warn IE users to upgrade to a better browser -->

    <script type="text/javascript">
      if (!(window.ActiveXObject) && 'ActiveXObject' in window) {
        document.body.insertAdjacentHTML(
          'afterbegin', 
          '<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com">upgrade your browser</a> to improve your experience.</p>'
        );
      }
    </script>

    <noscript>
      <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'spine'); ?>
      </div>
    <![endif]-->
    </noscript>

    <?php
      do_action('get_header');
      get_template_part('partials/header');
    ?>
    <div class="wrap" role="document">
      <main class="main">
        <?php load_template(template()->main()); ?>
      </main>
      <?php if (display_sidebar()) : ?>
          <?php template_part('partials/sidebar'); ?>
      <?php endif; ?>
    </div>
    <?php
      do_action('get_footer');
      get_template_part('partials/footer');
      wp_footer();
      get_template_part('partials/search');
    ?>
  </body>
</html>
