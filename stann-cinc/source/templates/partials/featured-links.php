<section class="featured-links">
    <div class="featured-links__container mw-container">
        <ul class="featured-links__list">
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('mass_times_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/church') ?>
                    Mass Times
                </a>
            </li>
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('calendar_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/calendar') ?>
                    Calendar
                </a>
            </li>
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('formed_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/play') ?>
                    FORMED
                </a>
            </li>
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('flocknote_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/lamb') ?>
                    Flocknote
                </a>
            </li>
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('giving_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/giving') ?>
                    Giving
                </a>
            </li>
            <li class="featured-links__item">
                <a href="<?= carbon_get_the_post_meta('live_stream_link_url') ?>" class="featured-links__link">
                    <?= get_template_part('svg/camera') ?>
                    Live Stream
                </a>
            </li>
        </ul>
    </div>
</section>