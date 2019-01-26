<div class="home-heading">
    <p class="home-heading__title"><?= $headingTitle ?></p>
    <hr class="home-heading__rule">
    <?php if(!empty($headingLink) && !empty($headingLinkText)): ?>
        <a href="<?= $headingLink ?>" class="home-heading__link"><?= $headingLinkText ?></a>
    <?php endif; ?>
</div>