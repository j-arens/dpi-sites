<section class="giving-template__section giving-outro mw-container">
    <div class="giving-outro__content">
        <?= carbon_get_post_meta(get_the_ID(), 'giving_outro_content') ?>
    </div>
    <div class="giving-outro__image" style="background-image: url(<?= carbon_get_post_meta(get_the_ID(), 'giving_outro_image') ?>)"></div>
</section>