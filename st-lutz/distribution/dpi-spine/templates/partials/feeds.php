<section class="feeds">
    <div class="feeds__container mw-container">
        <div class="feeds__mpa">
            <?php 

                $heading = 'App Messages';
                include locate_template('partials/component-title.php');
                get_template_part('partials/mpa');

            ?>
        </div>
        <div class="feeds__gce">
            <?php

                $heading = 'Calendar';
                include locate_template('partials/component-title.php');
                get_template_part('partials/gce');

            ?>
        </div>
    </div>
</section>