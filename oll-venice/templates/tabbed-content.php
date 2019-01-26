<?php
/**
 * Template Name: Tabbed Content
 */

$tabs = carbon_get_the_post_meta('tabbed_content', true);

?>

<div id="js-tabbed-root" class="tabbed__root">
    <aside class="tabbed__sidebar">
        <nav class="tabbed__nav">
            <?php foreach($tabs as $i => $tab): ?>
                <button class="tabbed__nav-item pulse-btn-lt <?= $i === 0 ? 'tabbed__nav-item--active' : '' ?>" data-idx="<?= $i ?>">
                    <?= wp_trim_words($tab['title'], 3, '...') ?>
                </button>
            <?php endforeach; ?>
        </nav>
    </aside>
    <div class="tabbed__content">
        <?php foreach($tabs as $i => $tab): ?>
            <article class="tabbed__tab <?= $i === 0 ? 'tabbed__tab--active' : '' ?>">
                <h1 class="tabbed__tab-title"><?= $tab['title'] ?></h1>
                <?= apply_filters('the_content', $tab['content']) ?>
            </article>
        <?php endforeach; ?>
    </div>
</div>
