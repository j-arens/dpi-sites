<section class="welcome-template__section welcome-intro mw-container">
    <div class="welcome-intro__video">
        <?= carbon_get_post_meta(get_the_ID(), 'welcome_intro_video') ?>
    </div>
    <div class="welcome-intro__content">
        <?= carbon_get_post_meta(get_the_ID(), 'welcome_intro_content') ?>
    </div>
</section>