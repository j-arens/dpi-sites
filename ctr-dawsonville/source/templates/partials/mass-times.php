<?php 

    $massTimes = array_replace_recursive(
        [
            [
                'label' => 'Saturday Vigil',
                'time' => '5:00 pm'
            ],
            [
                'label' => 'Sunday Mass',
                'time' => '9:00 & 11:30 am'
            ],
            [
                'label' => 'Mon & Wed - Fri',
                'time' => '9:00 am'
            ],
            [
                'label' => 'First Fri & Saturday\'s',
                'time' => '9:00 am'
            ]
        ],
        get_field('mass_times')
    );

    function dpiListMassTimes($times) {
        $counter = 0;
        $pageLink = !empty(get_field('mass_times_full_schedule_page_link')) ? get_field('mass_times_full_schedule_page_link') : '/mass-times';
        $list = '<ul class="home-mass-times">';

        foreach($times as $time) {
            if ($counter === 0) {
                $list .= '
                    <li class="home-mass-times__item">
                        <p class="home-mass-times__content">
                            <span class="home-mass-times__title-large font-bold">Mass</span>
                            <br>
                            <span class="home-mass-times__title-small">Times</span>
                        </p>
                        <hr class="home-mass-times__splitter">
                        <p class="home-mass-times__content">
                            <span class="home-mass-times__content-title">
                                ' . $time['label'] . '
                            </span>
                            <br>
                            <span class="home-mass-times__content-time font-bold">
                                ' . $time['time'] . '
                            </span>
                        </p>
                    </li>
                ';
            } else {
                $list .= '
                    <li class="home-mass-times__item">
                        <p class="home-mass-times__content">
                            <span class="home-mass-times__content-title">' . $time['label'] . '</span>
                            <br>
                            <span class="home-mass-times__content-time font-bold">
                                ' . $time['time'] . '
                            </span>
                        </p>
                    </li>
                ';
            }

            $counter++;
        }

        return $list .= '
                <li class="home-mass-times__item">
                    <a href="' . $pageLink . '" class="home-mass-times__link">
                        <span class="home-mass-times__content-title">View</span>
                        <br>
                        <span class="home-mass-times__content-time font-bold">Schedule</span>
                    </a>
                </li>
            </ul>
        ';
    }

?>

<?=dpiListMassTimes($massTimes)?>