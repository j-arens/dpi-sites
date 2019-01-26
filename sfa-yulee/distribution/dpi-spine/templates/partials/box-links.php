<?php 

    $boxLinksDefaults = [
        [
            'title' => 'Photo Albums',
            'image' => get_template_directory_uri() . '/assets/images/photo-albums-link.jpg',
            'page_to_link_to' => '#'
        ],
        [
            'title' => 'From Fr. Rafal',
            'image' => get_template_directory_uri() . '/assets/images/fr-rafal.jpg',
            'page_to_link_to' => '#'
        ]
    ];

    $boxLinks = array_replace($boxLinksDefaults, get_field('link_boxes'));

?>

<div class="link-boxes">
    <div class="link-boxes--tall-container">
        <?php foreach($boxLinks as $link) { ?>
            <div class="link-boxes--box box box__bolts">
                <h2 class="link-boxes--box-title box-title box-title__cursive"><?= $link['title'] ?></h2>
                <a href="<?= $link['page_to_link_to'] ?>" class="link-boxes--box-link">
                    <img class="link-boxes--box-link-img" src="<?= $link['image'] ?>">
                    View More
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="link-boxes--box link-boxes--box__short box box__bolts">
        <h2 class="link-boxes--box-title box-title box-title__cursive">
            <a href="<?= get_field('short_link_box_page_to_link_to') ?: '#' ?>" class="link-boxes--box-link">
                <?= get_field('short_link_box_title') ?: 'Temp Stuff' ?>
            </a>
        </h2>
    </div>
</div>