<?php 

    $ministryItems = [
        [
            'icon' => 'worship-spirit-icon',
            'title' => 'Worship & Spiritual Life',
            'fieldName' => 'worship_&_spiritual_life'
        ],
        [
            'icon' => 'prayer-icon',
            'title' => 'Prayer',
            'fieldName' => 'prayer'
        ],
        [
            'icon' => 'evang-icon',
            'title' => 'Evangelization',
            'fieldName' => 'evengelization'
        ],
        [
            'icon' => 'family-icon',
            'title' => 'Family Life',
            'fieldName' => 'family_life'
        ],
        [
            'icon' => 'edu-form-icon',
            'title' => 'Education & Formation',
            'fieldName' => 'education_&_formation'
        ],
        [
            'icon' => 'youth-icon',
            'title' => 'Youth',
            'fieldName' => 'youth'
        ]
    ];

?>

<div class="ministries">
    <nav class="ministries__nav">
        <button class="ministries__nav-toggle"></button>
        <ul class="ministries__nav-menu">
            <?php 
                $count = 1;
                foreach($ministryItems as $item) {
                    echo '
                        <li class="ministries__nav-item ' . ($count <=1 ? "ministries__nav-item_active" : "") . '">
                            ' . file_get_contents(__DIR__ . '/../svg/' . $item['icon'] . '.php') . '
                            <p class="ministries__nav-item_title font-yk">
                                ' . $item['title'] . '
                            </p>
                        </li>
                    ';

                    $count++;
                }
            ?>
        </ul>
    </nav>
    <section class="ministries__tabs">
        <?php 
            $count = 1;
            foreach($ministryItems as $item) {
                echo '
                    <article class="ministries__tabs-article ' . ($count <= 1 ? "ministries__tabs-article_active" : "") . '">
                        ' . get_field($item['fieldName']) . '
                    </article>
                ';

                $count++;
            }
        ?>
    </section>
</div>