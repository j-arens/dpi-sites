<?php

namespace Spine\Scripts\php;

class Columns {

    public static function make($cols = 0) {
        if (!$cols) return;

        if (gettype($cols) !== 'integer') {
            $cols = intval($cols);
        }

        ?>
            <div class="col__container mw-container">
                <?php for($i = 1; $i <= $cols; $i++) { ?>
                    <div class="col <?= 'col--' . $cols ?>">
                        <article>
                            <?= apply_filters('the_content', carbon_get_the_post_meta('column_' . $i)) ?>
                        </article>
                    </div>
                <?php } ?>
            </div>
        <?php
    }
}