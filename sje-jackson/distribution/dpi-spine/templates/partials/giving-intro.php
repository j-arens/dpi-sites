<section class="giving-template__section giving-intro mw-container">
    <div class="giving-intro__image" style="background-image: url(<?= carbon_get_post_meta(get_the_ID(), 'giving_intro_image') ?>)"></div>
    <div class="giving-intro__content">
        <?= carbon_get_post_meta(get_the_ID(), 'giving_intro_content') ?>
    </div>
</section>