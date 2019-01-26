<?php

    $bulletins = dpiGetBulletins(4);
    $current = array_shift($bulletins);

?>

<div class="parish-info__feed-container bulletins-feed">
    <div class="bulletins-feed__current">
        <a 
            class="bulletins-feed__cover" 
            style="background-image: url(<?= $current['links']['cover'] ?>)" 
            href="<?= $current['links']['bulletin'] ?>"
            target="_blank" 
            rel="noopener"
        ></a>
        <div class="bulletins-feed__current-info">
            <p class="bulletins-feed__text">Most Recent Bulletin</p>
            <time class="bulletins-feed__current-date">
                <?= date('M jS, Y', strtotime($current['date'])) ?>
            </time>
            <a href="https://discovermass.com/church/santa-teresa-bryan-tx#bulletins" target="_blank" rel="noopener" class="bulletins-feed__button">
                Discover Mass
            </a>
        </div>
    </div>
    <div class="bulletins-feed__archive">
        <p class="bulletins-feed__text">Archived Bulletins</p>
        <?php foreach($bulletins as $bulletin) { ?>
            <a href="<?= $bulletin['links']['bulletin'] ?>" class="bulletins-feed__archive-link" target="_blank" rel="noopener">
                <?= date('M jS, Y', strtotime($bulletin['date'])) ?>
            </a>
        <?php } ?>
    </div>
</div>