<?php
    $queryCatID = get_query_var('cat', false);
?>

<div id="cat-filter-js" class="cat-filter">
    <p class="cat-filter__title">Filter By Category</p>
    <select class="cat-filter__dropdown cat-filter-dropdown-js">
        <option value="filter_none" <?= !$queryCatID ? 'selected' : '' ?>>All</option>
        <?php foreach(get_categories() as $cat) { ?>
            <option value="<?= $cat->term_id ?>" <?= $cat->term_id === $queryCatID ? 'selected' : '' ?>><?= $cat->name ?></option>
        <?php } ?>
    </select>
</div>