<?php $messages = MyParishApp\Classes\getMpaMessages(4); ?>

<section class="mpa-feed">
    <div class="mw-container-lg mpa-feed__container">
        <span class="mpa-feed__heading">myParish App Messages</span>
        <?php if (!empty($messages)): ?>
            <ul class="mpa-feed__root">
                <li class="mpa-feed__item mpa-feed__item mpa-feed__promo">
                    <a href="https://mypari.sh/nn7u" target="_blank" rel="noopener" class="mpa-feed__item-title">Download the App Today</a>
                    <div class="mpa-feed__promo-links">
                        <a href="https://mypari.sh/nn7u" target="_blank" rel="noopener" class="mpa-feed__promo-link">
                            <?= get_template_part('svg/mpa', 'logo') ?>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.michiganlabs.myparish" class="mpa-feed__promo-link" target="_blank" rel="noopener">
                            <?= get_template_part('svg/mpa', 'android') ?>
                        </a>
                        <a href="https://itunes.apple.com/us/app/myparish-catholic-life-every/id892066479?mt=8" target="_blank" rel="noopener" class="mpa-feed__promo-link">
                            <?= get_template_part('svg/mpa', 'apple') ?>
                        </a>
                    </div>
                </li>
                <?php foreach($messages as $message): ?>
                    <li class="mpa-feed__item">
                        <span class="mpa-feed__item-title"><?= date('F j, Y', strtotime($message->post_date)) ?></span>
                        <p class="mpa-feed__excerpt">
                            <?= wp_trim_words($message->post_content, 10, '...') ?>
                        </p>
                        <a href="<?= get_permalink($message) ?>" class="mpa-feed__link">View More...</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="mpa-feed__empty">There aren't any messages to show you right now, please check back later.</p>
        <?php endif ?>
    </div>
</section>