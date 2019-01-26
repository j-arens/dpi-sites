<?php

class DPI_GCAL_Events {

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
            throw new Exception('DPI GCAL EVENTS: setApiKey expects a string, you passed a(n) ' . gettype($key) . '.');
            return false;
        }
    }

    public function setCalendarId($id) {
        if (gettype($id) === 'string') {
            $this->calendar_id = $id;
        } else {
            throw new Exception('DPI GCAL EVENTS: setCalendarId expects a string, you passed a(n) ' . gettype($id) . '.');
            return false;
        }
    }

    public function setStartTime($timestamp) {
        if (gettype($timestamp) === 'integer') {
            $this->startTime = $timestamp;
        } else {
            throw new Exception('DPI GCAL EVENTS: setStartTime expects a unix timestamp, you passed a(n) ' . gettype($timestamp) . '.');
            return false;
        }
    }

    public function setEndTime($timestamp) {
        if (gettype($timestamp) === 'integer') {
            $this->endTime = $timestamp;
        } else {
            throw new Exception('DPI GCAL EVENTS: setEndTime expects a unix timestamp, you passed a(n) ' . gettype($timestamp) . '.');
            return false;
        }
    }

    public function setMaxEvents($int) {
        if (gettype($int) === 'integer') {
            $this->maxEvents = $int;
        } else {
            throw new Exception('DPI GCAL EVNETS: setMaxEvents expects an integer, you passed a(n) ' . gettype($int) . '.');
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

        throw new Exception('DPI GCAL EVENTS: The api key and calendar id must be set before getting events!');
        return false;
    }
}