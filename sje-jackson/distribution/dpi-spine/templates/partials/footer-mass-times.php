<div class="footer-mass">
    <p class="site-footer__widget-title">Mass Times</p>
    <?php foreach(carbon_get_theme_option('footer_mass_times', 'complex') as $schedule) { ?>
        <p class="footer-mass__list-title"><?= $schedule['mass_schedule_title'] ?></p>
        <ul class="footer-mass__list">
            <?php foreach($schedule['mass_schedule_times'] as $time) { ?>
                <li class="footer-mass__item"><?= $time['mass_schedule_time'] ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <a href="<?= get_page_link(carbon_get_theme_option('footer_mass_times_page_link'))[0] ?>" class="footer-mass__link">View More ></a>
</div>