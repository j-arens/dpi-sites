<?php

namespace Spine\Scripts\PHP;

class GCE {
    
    private $api_key;
    private $calendar_id;
    private $startTime;
    private $endTime;
    private $maxEvents; 
    
    public function __construct() {
        $this->startTime = strtotime('now');
        $this->endTime = strtotime('+1 year');
        $this->maxEvents = 4;
    }
    
    public function setApiKey($key) {
        if (gettype($key) === 'string') {
            $this->api_key = $key;
        } else {
            throw new \Exception('DPI GCAL EVENTS: setApiKey expects a string, you passed a(n) ' . gettype($key) . '.');
            return false;
        }
    }
    
    public function setCalendarId($id) {
        if (gettype($id) === 'string') {
            $this->calendar_id = $id;
        } else {
            throw new \Exception('DPI GCAL EVENTS: setCalendarId expects a string, you passed a(n) ' . gettype($id) . '.');
            return false;
        }
    }
    
    public function setStartTime($timestamp) {
        if (gettype($timestamp) === 'integer') {
            $this->startTime = $timestamp;
        } else {
            throw new \Exception('DPI GCAL EVENTS: setStartTime expects a unix timestamp, you passed a(n) ' . gettype($timestamp) . '.');
            return false;
        }
    }
    
    public function setEndTime($timestamp) {
        if (gettype($timestamp) === 'integer') {
            $this->endTime = $timestamp;
        } else {
            throw new \Exception('DPI GCAL EVENTS: setEndTime expects a unix timestamp, you passed a(n) ' . gettype($timestamp) . '.');
            return false;
        }
    }
    
    public function setMaxEvents($int) {
        if (gettype($int) === 'integer') {
            $this->maxEvents = $int;
        } else {
            throw new \Exception('DPI GCAL EVNETS: setMaxEvents expects an integer, you passed a(n) ' . gettype($int) . '.');
            return false;
        }
    }
    
    private function propsAreSet() {
        return count(array_filter(get_object_vars($this))) === 5;
    }
    
    private function generateEndpoint() {
        $startTime = str_replace('+', '-', date('c', $this->startTime));
        $endTime = str_replace('+', '-', date('c', $this->endTime));
        return 'https://www.googleapis.com/calendar/v3/calendars/' . $this->calendar_id . '/events?orderBy=startTime&singleEvents=true&timeMax=' . $endTime . '&timeMin=' . $startTime . '&key=' . $this->api_key;
    }
    
    public function getEvents() {
        if ($this->propsAreSet()) {
            $res = wp_remote_get($this->generateEndpoint());
            if (is_wp_error($res)) {
                return false;
            }
            return array_slice(json_decode(wp_remote_retrieve_body($res))->items, 0, $this->maxEvents);
        }
        throw new \Exception('DPI GCAL EVENTS: The api key and calendar id must be set before getting events!');
        return false;
    }
}

    // $gce = new Spine\Scripts\PHP\GCE();
    $gce = new GCE();
    $gce->setApiKey('AIzaSyBGl_q6VJl6KOWyLI5C6Fs3lJuLlO_iLIk');
    $gce->setCalendarId('a4tem59n6tg1mgac5j0457orq8@group.calendar.google.com');
    $gce->setMaxEvents(4);
    $gceEvents = $gce->getEvents();
    
?>

<div class="parish-info__feed-container gce-feed">
    <?php 
        if (!empty($gceEvents)):
    ?>
        <ul class="gce-feed__list">
            <?php foreach(array_splice($gceEvents, 0, 3) as $event) { ?>
                <?php
                    $date = '';
                    
                    if (property_exists($event->start, 'date')) {
                        $date = strtotime($event->start->date);
                    } else if (property_exists($event->start, 'dateTime')) {
                        $date = strtotime($event->start->dateTime);
                    }
                ?>
                <li class="gce-feed__item">
                    <div class="gce-feed__date">
                        <p class="gce-feed__month"><?= date('M', $date) ?></p>
                        <p class="gce-feed__day"><?= date('jS', $date) ?></p>
                    </div>
                    <div class="gce-feed__content">
                        <p class="gce-feed__event-title"><?= wp_trim_words($event->summary, 3, '...') ?></p>
                        <a class="gce-feed__event-link" href="#">
                            View on calendar
                            <?= get_template_part('svg/arrow-right') ?>
                        </a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php else: ?>
        <p class="gve-feed__empty">Sorry, there aren't any events right now.</p>
    <?php endif; ?>
</div>