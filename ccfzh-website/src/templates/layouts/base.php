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
      <div class="gutter gutter-left"></div>
      <div class="<?php echo is_home() ? 'home-wrap' : 'container';  ?>">
        <main class="main">
          <?php load_template(template()->main()); ?>
        </main>
        <?php if (display_sidebar()) : ?>
          <button class="sidebar-toggle"><p>Toggle Sidebar</p></button>
          <aside class="primary-sidebar">
            <?php template_part('partials/sidebar'); ?>
          </aside>
        <?php endif; ?>
      </div>
      <div class="gutter gutter-right"></div>
    </div>
    <?php
      do_action('get_footer');
      get_template_part('partials/footer');
      wp_footer();
    ?>
  </body>
</html>
