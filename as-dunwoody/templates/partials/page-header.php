<?php $controller = new Spine\scripts\php\PageHeader(); ?>

<div class="page-header">
    <div class="page-header__image-container" style="background-image: url(<?= $controller->getFeaturedImg() ?>);"></div>
    <div class="page-header__title-container">
        <?= $controller->getTitle() ?>
    </div>
</div>