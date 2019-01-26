<?php namespace Spine\scripts\php;

class CalendarFeed {

    private $endpoint = 'http://www.calendarwiz.com/calendars/rssfeeder.xml?crd=sainttimslutz&len=0&days=1&events=6&cat=all';
    private $calendarID = 'sainttimslutz';
    private $days = 1;
    private $events = 6;
    private $category = 'all';

    public $catchAllDashPattern = '/(?<=-)(.+?)(?=-)/';
    public $categoryPattern = '/^[A-Z][^-]*/'; // /g - use preg_match_all
    public $monthPattern = '/(?<=,)(\s\w+)(?=\s)/';
    public $dayNumericPattern = '/\d+?(?=,)/';
    public $timeStartPattern = '/(?<=\d{4}\s)\d.+?(?=\s)/';
    public $timeEndPattern = '/(?<=-\s)\d.+?(?=\s)/';

    public function buildUrl() {
        return $this->endpoint . $this->calendarID . '&len=0&days=' . $this->days . '&events=' . $this->events . '&cat=' . $this->category;
    }

    public function getCalenderEvents() {
        $res = fetch_feed($this->buildUrl());

        if (!is_wp_error($res)) {
            $limit = $res->get_item_quantity($this->events);
            return $res->get_items(0, $limit);
        }

        return false;
    }

    // this function is disgusting - deal with it
    public function parseFeed($feed) {
        return array_map(function($event) {

            $content = $event->get_title();

            $categoryMatch = preg_match_all($this->categoryPattern, $content, $categories);
            $titleMatch = preg_match($this->catchAllDashPattern, $content, $titles);
            $dayNumericMatch = preg_match($this->dayNumericPattern, $content, $day);
            $monthMatch = preg_match($this->monthPattern, $content, $month);
            $timeStartMatch = preg_match($this->timeStartPattern, $content, $timeStart);
            $timeEndMatch = preg_match($this->timeEndPattern, $content, $timeEnd);

            return [
                'category' => $categoryMatch ? array_pop($categories[0]) : '',
                'title' => $titleMatch ? array_pop($titles) : '',
                'month' => $monthMatch ? array_pop($month) : '',
                'day' => $dayNumericMatch ? array_pop($day) : '',
                'start' => $timeStartMatch ? array_pop($timeStart) : '',
                'end' => $timeEndMatch ? array_pop($timeEnd) : '',
                'link' => $event->get_permalink()
            ];

        }, $feed);
    }
}