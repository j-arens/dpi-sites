

<section class="mass-times">
    <div class="mass-times__container mw-container">
        <p class="mass-times__heading mass-times__ucb">
            <?= get_template_part('svg/bell') ?>
            Mass Times:
        </p>
        <div class="mass-times__item mass-times__weekend">
            <p class="mass-times__time"><?= carbon_get_the_post_meta('mass_times_content_1') ?></p>
        </div>
        <div class="mass-times__item mass-times__daily">
            <p class="mass-times__time"><?= carbon_get_the_post_meta('mass_times_content_2') ?></p>
        </div>
    </div>
</section>

<!-- <p class="mass-times__item-title">Weekend:</p> -->  
<!-- <span class="mass-times__ucb">saturday</span> | 5:30PM Vigil -->
<!-- <p class="mass-times__time"><span class="mass-times__ucb">sunday</span> | 7:30, 9, 11AM & 5:30PM</p> -->

<!-- <p class="mass-times__item-title">Daily:</p>
<p class="mass-times__time"><span class="mass-times__ucb">monday - saturday</span> | 9AM</p>
<p class="mass-times__time"><span class="mass-times__ucb">wednesday</span> | 6:00PM</p> -->