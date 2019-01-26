<section class="home-intro">
    <div class="home-intro__container mw-container">
        <div class="home-intro__content">
            <h1 class="home-intro__title">Welcome <span class="font-os font-li font-accent">to</span> Our Lady <span class="font-os font-li font-accent">of</span> Lourdes</h1>
            <p class="home-intro__content-text"><?= carbon_get_the_post_meta('home_intro_msg') ?></p>
            <div class="home-intro__links">
                <?php foreach(carbon_get_the_post_meta('home_intro_links', true) as $link): ?>
                    <a 
                        href="<?= esc_url($link['url']) ?>" 
                        class="home-intro__link btn"
                        <?= $link['new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                    >
                        <?= $link['title'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="home-intro__video">
            <?= carbon_get_the_post_meta('home_intro_video_url') ?>
        </div>
    </div>
</section>