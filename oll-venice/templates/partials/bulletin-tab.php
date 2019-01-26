<div class="bulletin-tab">
    <div class="bulletin-tab__links">
        <a href="<?= esc_url($bulletin['links']['bulletin']) ?>" target="_blank" rel="noopener" class="bulletin-tab__link">
            <?= get_template_part('svg/pdf') ?>
            View Bulletin
        </a>
        <a href="https://discovermass.com/church/our-lady-of-lourdes-venice-fl/#bulletins" target="_blank" rel="noopener" class="bulletin-tab__link">
            <?= get_template_part('svg/discovermass') ?>
            See More Bulletins on DiscoverMass
        </a>
    </div>
    <div class="bulletin-tab__cover">
        <a href="<?= esc_url($bulletin['links']['bulletin']) ?>" target="_blank" rel="noopener" class="bulletin-tab__cover-link">
            <img src="<?= esc_url($bulletin['links']['cover']) ?>" alt="Bulletin Cover" class="bulletin-tabs__cover-img">
        </a>
    </div>
</div>