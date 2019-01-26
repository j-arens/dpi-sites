<?php 

    $items = [
        [
            'title' => 'Bulletins',
            'icon' => 'bulletin',
            'feed-template' => 'bulletins-feed'
        ],
        [
            'title' => 'Mass Times',
            'icon' => 'bell',
            'feed-template' => 'mass-times-feed'
        ],
        [
            'title' => 'Parish Calendar',
            'icon' => 'calendar',
            'feed-template' => 'gce-feed'
        ]
    ];

?>

<section class="parish-info mw-container">
    <ul class="parish-info__list">
        <?php if (!empty($items)): ?>
            <?php foreach($items as $item) { ?>
                <li id="<?= 'js-anim-' . $item['icon'] ?>" class="parish-info__item">
                    <?= get_template_part('svg/' . $item['icon']) ?>
                    <p class="parish-info__title">
                        <?= $item['title'] ?>
                    </p>
                    <hr class="parish-info__rule">
                    <?= get_template_part('partials/' . $item['feed-template']) ?>
                </li>
            <?php } ?>
        <?php endif; ?>
    </ul>
</section>