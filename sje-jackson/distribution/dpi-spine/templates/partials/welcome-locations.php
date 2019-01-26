<?php

    $locationsFields = carbon_get_post_meta(get_the_ID(), 'welcome_locations', 'complex');

    $locations = array_map(function($location) {
        return [
            'coords' => [
                'lat' => explode(',', $location['location_map'])[0],
                'lng' => explode(',', $location['location_map'])[1],
            ],
            'title' => $location['location_title'],
            'meta' => [
                [
                    'className' => 'address',
                    'icon' => 'location-pin',
                    'value' => $location['address']
                ],
                [
                    'className' => 'phone',
                    'icon' => 'phone-circ',
                    'value' => $location['phone_number']
                ],
                [
                    'className' => 'hours',
                    'icon' => 'church',
                    'value' => $location['hours']
                ]
            ]
        ];
    }, $locationsFields);

?>

<section id="js-locations-root" class="welcome-template__section welcome-locations mw-container">
    <?php if (!empty($locations)): ?>
        <nav class="welcome-locations__nav">
            <?php 
                array_walk($locations, function($location, $i) {
                    ?>
                        <button class="js-locations-btn welcome-locations__btn <?= ($i === 0 ? 'welcome-locations__btn--is-active' : '') ?>">
                            <?= $location['title'] ?>
                        </button>
                    <?php
                });
            ?>
        </nav>
        <ul class="welcome-locations__list">
            <?php 
                array_walk($locations, function($location, $i) {
                    ?>
                        <li class="js-locations-tab welcome-locations__item <?= ($i === 0 ? 'welcome-locations__item--is-active' : '') ?>">
                            <div id="js-map-<?= $i ?>" class="welcome-locations__map-container">
                                <script type="text/javascript">
                                    function <?= 'loadMap' . $i . '()' ?> {
                                        window.DpiMaps.createMap(
                                            document.getElementById('<?= 'js-map-' . $i ?>'), 
                                            <?= $location['coords']['lat'] ?>, 
                                            <?= $location['coords']['lng'] ?>
                                        );
                                    }

                                    if (!window.hasOwnProperty('DpiMaps')) {
                                        document.addEventListener('routesFired', <?= 'loadMap' . $i ?>);
                                    } else {
                                        <?= 'loadMap' . $i . '()' ?>
                                    }
                                </script>
                            </div>
                            <div class="welcome-locations__content">
                                <div class="welcome-locations__church-meta">
                                    <p class="welcome-locations__title"><?= $location['title'] ?></p>
                                    <ul class="welcome-locations__info">
                                        <?php foreach($location['meta'] as $meta) { ?>
                                            <?php if ($meta['value']): ?>
                                                <li class="welcome-locations__info-item <?= 'welcome-locations__' . $meta['className'] ?>">
                                                    <?= get_template_part('svg/' . $meta['icon']) ?>
                                                    <?= $meta['value'] ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <a 
                                    href="<?= '//maps.google.com/maps?z=15&t=m&q=loc:' . $location['coords']['lat'] . '+' . $location['coords']['lng'] ?>"
                                    target="_blank"
                                    class="welcome-locations__link">
                                        Directions
                                </a>
                            </div>
                        </li>
                    <?php
                });
            ?>
        </ul>
    <?php endif; ?>
</section>