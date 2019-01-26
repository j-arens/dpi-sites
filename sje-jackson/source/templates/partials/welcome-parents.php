<?php 

    $items = carbon_get_post_meta(get_the_ID(), 'welcome_parents_items', 'complex');
    $itemCount = count($items);

?>

<section class="welcome-template__section welcome-parents">
    <div class="welcome-parents__container mw-container">
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <div class="welcome-parents__col">
                <?php if ($i === 0): ?>
                    <p class="welcome-parents__title"><?= carbon_get_post_meta(get_the_ID(), 'welcome_parents_title') ?></p>
                <?php endif; ?>
                <ul class="welcome-parents__list">
                    <?php foreach(array_splice($items, 0, ($i === 0 ? ceil($itemCount / 3) - 1 : ceil($itemCount / 3)))  as $item) { ?>
                        <li class="welcome-parents__item"><?= $item['item_content'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</section>