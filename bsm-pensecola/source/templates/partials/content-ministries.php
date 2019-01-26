<?php

    $ministryItems = carbon_get_the_post_meta('ministries_tabs', 'complex');
    $ministryTabsShortcode = '[su_tabs vertical="yes"]';

?>

<div id="js-ministries" class="ministries mw-container">
    <?= get_template_part('partials/page-title') ?>
    <article class="ministries__intro">
        <?= apply_filters('the_content', carbon_get_the_post_meta('ministries_intro_content')) ?>
    </article>
    <hr class="ministries__rule">
    <div class="ministries__tab-container">
        <?php

            foreach($ministryItems as $item) {
                $ministryTabsShortcode .= '[su_tab title="' . $item['ministry_name'] . '"]<p class="ministries__content">' . $item['ministry_content'] . '</p>[/su_tab]';
            }

            $ministryTabsShortcode .= '[/su_tabs]';

            echo do_shortcode($ministryTabsShortcode);
        ?>
    </div>
</div>

