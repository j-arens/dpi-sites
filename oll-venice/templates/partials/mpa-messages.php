<?php

    $mpaMessages = [];
    
    if (function_exists('MyParishApp\Classes\getMpaMessages')) {
        $mpaMessages = MyParishApp\Classes\getMpaMessages(5);
    }
    
    function generateMessageItem($message) {
        ?>
            <li class="mpa__item">
                <time class="mpa__time" datetime="<?= ($message->post_date_gmt ?: '') ?>">
                    <?= date('n/d/y g:ia', strtotime($message->post_date)) ?>
                </time>
                <p class="mpa__content">
                    <?= wp_trim_words($message->post_content, 10, '...') ?>
                </p>
                <a href="<?= get_permalink($message) ?>" class="mpa__link">View Message</a>
            </li>
        <?php
    }

?>

<div class="mpa">
    <p class="home-feeds__title">App Messages</p>
    <div class="mpa__messages-container">
        <ul class="mpa__list">
            <li class="mpa__item mpa__promo">
                <p class="mpa__promo-title">myParish App</p>
                <div class="mpa__promo-icons">
                    <a href="//myparishapp.net" class="mpa__promo-icon-link" target="_blank" rel="noopener">
                        <?= get_template_part('svg/mpa-feed') ?>
                    </a>
                    <a href="https://itunes.apple.com/us/app/myparish-catholic-life-every/id892066479?mt=8" class="mpa__promo-icon-link" target="_blank" rel="noopener">
                        <?= get_template_part('svg/mpa-apple') ?>
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.michiganlabs.myparish" class="mpa__promo-icon-link" target="_blank" rel="noopener">
                        <?= get_template_part('svg/mpa-android') ?>
                    </a>
                </div>
                <a href="//myparishapp.net" class="mpa__promo-link" target="_blank" rel="noopener">Download Our App</a>
            </li>
            <?php if (!empty($mpaMessages)): ?>
                <?php foreach(array_splice($mpaMessages, 0, 2) as $message) { ?>
                    <?= generateMessageItem($message) ?>
                <?php } ?>
            <?php endif; ?>
        </ul>
        <ul class="mpa__list">
            <?php if (!empty($mpaMessages)): ?>
                <?php foreach($mpaMessages as $message) { ?>
                    <?= generateMessageItem($message) ?>
                <?php } ?>
            <?php endif; ?>
        </ul>
    </div>
</div>