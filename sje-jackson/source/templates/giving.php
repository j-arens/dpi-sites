<?php
/**
 * Template Name: Giving Template
 */

  $givingComponents = [
      'giving-intro',
      'giving-ctas',
      'giving-banner',
      'giving-outro'
 ];

 get_template_part('partials/page-header');

?>

<article>
    <?php foreach($givingComponents as $comp) { ?>
        <?= get_template_part('partials/' . $comp) ?>
    <?php } ?>
</article>