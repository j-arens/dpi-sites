<?php
/**
 * Template Name: Sub Pages
 */

 $childPages = get_pages(['child_of' => get_the_ID(), 'post_status' => 'publish']);

 ?>

<?= get_template_part('partials/page-header'); ?>
<article>
    <?= get_post(get_the_ID())->post_content ?>
</article>
<?php if (!empty($childPages)): ?>
        <?php foreach(array_chunk($childPages, 3) as $pageGroup) { ?>
            <div class="col__container mw-container">
                <?php foreach($pageGroup as $page) { ?>
                    <div class="col col--3 subpage__item">
                        <?php
                            $pageThumbnail = get_the_post_thumbnail_url($page->ID, 'large');

                            if (!$pageThumbnail) {
                                $pageThumbnail = get_template_directory_uri() . '/assets/images/page-header-2.jpg';
                            }
                        ?>
                        <div class="subpage__thumbnail" style="background-image: url(<?= $pageThumbnail ?>)"></div>
                        <h3 class="subpage__title"><?= $page->post_title ?></h3>
                        <a href="<?= get_page_link($page->ID) ?>" class="subpage__link">Learn More</a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
<?php endif; ?>