<?php

    $links = [
        [
            'icon' => 'mpa-feed',
            'link' => $deepLink
        ],
        [
            'icon' => 'mpa-apple-nf',
            'link' => 'https://itunes.apple.com/us/app/myparish-catholic-life-every/id892066479?mt=8'
        ],
        [
            'icon' => 'mpa-android-nf',
            'link' => 'https://play.google.com/store/apps/details?id=com.michiganlabs.myparish'
        ]
    ];

?>

<p>
    Download our app to stay up to date with church events and notifications. Keep our prayers, readings, and reflections in your pocket at all times.
</p>
<div class="mpa-tab__promo-links">
    <?php foreach($links as $link): ?>
        <a href="<?= esc_url($link['link']) ?>" target="_blank" rel="noopener" class="mpa-tab__promo-link">
            <?= get_template_part('svg/' . $link['icon']) ?>
        </a>
    <?php endforeach; ?>
</div>
<a href="<?= esc_url($deepLink) ?>" target="_blank" rel="noopener">Download Our App</a>