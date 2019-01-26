<?php

    wp_reset_postdata();

    function getItems() {
        return array_map(function($id) {
            
            return [
                'title' => carbon_get_the_post_meta('featured_item_' . $id . '_title'),
                'thumbnailID' => carbon_get_the_post_meta('featured_item_' . $id . '_thumbnail'),
                'content' => carbon_get_the_post_meta('featured_item_' . $id . '_content'),
                'buttons' => carbon_get_the_post_meta('featured_item_' . $id . '_buttons', true)
            ];

        }, ['item_1', 'item_2', 'item_3', 'item_4']);
    }

    function getThumbnailURL($id) {
        return wp_get_attachment_image_src($id, 'full')[0];
    }

    $items = getItems();

?>

<section class="featured-links">
    <div class="mw-container-lg featured-links__container">
        <div id="js-featured-links-root" class="featured-links__root">
            <div class="featured-links__header">
                <span class="featured-links__heading font-medium">Featured Items</span>
            </div>
            <div class="featured-links__flex-container">
                <ul class="featured-links__portals">
                    <?php foreach($items as $key => $item): ?>
                        <li class="featured-links__portal js-featured-links-portal <?= $key === 0 ? 'featured-links__portal--active' : '' ?>" 
                            style="background-image: url(<?= getThumbnailURL($item['thumbnailID']) ?>)">
                                <p class="featured-links__portal-title font-medium"><?= $item['title'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="featured-links__content-container">
                    <?php foreach($items as $key => $item): ?>
                        <div class="featured-links__portal-card js-featured-links-card <?= $key === 0 ? 'featured-links__portal-card--active' : '' ?>">
                            <span class="featured-links__portal-card-title font-regular"><?= $item['title'] ?></span>
                            <div class="featured-links__portal-content">
                                <?= apply_filters('the_content', $item['content']) ?>
                            </div>
                            <div class="featured-links__portal-links">
                                <?php if (!empty($item['buttons'])): ?>
                                    <?php foreach($item['buttons'] as $button): ?>
                                        <a 
                                            href="<?= esc_url($button['featured_item_button_link']) ?>" 
                                            <?= $button['featured_item_button_new_tab'] === 'yes' ? 'target="_blank" rel="noopener"' : '' ?> 
                                            class="featured-links__portal-link btn">
                                                <?= $button['featured_item_button_title'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>