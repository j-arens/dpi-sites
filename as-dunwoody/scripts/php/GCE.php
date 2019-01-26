<?php

namespace Spine\scripts\php;

class GCE {

    protected $apiKey;
    protected $calendarID;
    protected $startTime;
    protected $endTime;
    protected $maxEvents; 
    protected $timezone;
    
    /**
    * Class constructor, set defaults for several properties
    */
    public function __construct() {
        $this->startTime = strtotime('now');
        $this->endTime = strtotime('+1 year');
        $this->maxEvents = 4;
    }

    /**
    * Setter, check validity of passed in props & set
    * @param{property} $property
    * @param{*} $value
    * @return{boolean} returns false if property doesn't exist, or if $value is not valid
    */
    public function __set($property, $value) {
        if (!property_exists($this, $property)) {

            return $this->exception(
                'Cannot set non-existent property: ' . $property
            );

            return false;
        }

        switch ($property) {
            case 'apiKey':
            case 'calendarID':
            case 'timezone':

                if (gettype($value) !== 'string') {
                    $this->exception(
                        $property . ' expects a string. You passed a(n) ' . gettype($value) . '.'
                    );

                    return false;
                }

                $this->$property = $value;

                break;

            case 'startTime':
            case 'endTime':
            case 'maxEvents':

                if (gettype($value) !== 'integer') {
                    $this->exception(
                        $property . ' expects an integer. You passed a(n) ' . gettype($value) . '.'
                    );

                    return false;
                }

                $this->$property = $value;

                break;
        }
    }

    /**
    * Check that all of the properties have been set
    * @return{boolean} true/false
    */
    private function propsAreSet() {
        return count(array_filter(get_object_vars($this))) === 6;
    }

    /**
    * Create the google calendar api endpoint
    * @return{string} api endpoint
    */
    private function generateEndpoint() {
        $base = 'https://www.googleapis.com/calendar';
        $version = '/v3/';
        $results = '&maxResults=' . $this->maxEvents;
        $timezone = '&timeZone=' . urlencode($this->timezone);
        $startTime = '&timeMin=' . str_replace('+', '-', date('c', $this->startTime));
        $endTime = '&timeMax=' . str_replace('+', '-', date('c', $this->endTime));

        return "{$base}{$version}calendars/{$this->calendarID}/events?singleEvents=true{$results}{$timezone}{$startTime}{$endTime}&key={$this->apiKey}";
    }

    /**
    * Get an array of the calendar events
    * @return{array} returns an array of event objects
    */
    public function getEvents() {
        if (!$this->propsAreSet()) {

            $this->exception('
                The API key, calendar ID, and timezone must be set before getting events!
            ');

            return false;
        }

        $res = wp_remote_get($this->generateEndpoint());

        if (is_wp_error($res) || wp_remote_retrieve_response_code($res) !== 200) {
            return [];
        }

        return array_slice(json_decode(wp_remote_retrieve_body($res))->items, 0, $this->maxEvents);
    }

    /**
    * Get the event "summary", which is really what it's called
    * @param{object} $event
    * @return{boolean/string} false if there's no event summary prop, otherwise returns event summary
    */
    public function getEventName($event) {
        if (!is_object($event)) return false;

        if (!property_exists($event, 'summary')) {
            return false;
        }

        return $event->summary;
    }

    /**
    * Get the event start or end time, google is inconsistent with the way their props are named, so we have to check if they even exist
    * @param{object} $event
    * @param{string} $prop
    * @return{boolean/int} false if there's no start, date, or dateTime props, otherwise resolves the prop
    */
    private function getDateProps($event, $prop) {
        if (!is_object($event) || !property_exists($event, $prop)) {
            return false;
        }

        if (property_exists($event->$prop, 'dateTime')) {
            return $event->$prop->dateTime;
        }

        if (property_exists($event->$prop, 'date')) {
            return $event->$prop->date;
        }

        return false;
    }

    /**
    * Get the event start date as a timestamp
    * @param{object} $event
    * @return{boolean/int} false if there's no start time, otherwise returns timestamp of the start time
    */
    public function getStartDateTimestamp($event) {
        if (!is_object($event)) return false;

        $date = $this->getDateProps($event, 'start');

        if ($date) {
            return strtotime($date);
        }

        return false;
    }

    /**
    * Get the event end date as a timestamp
    * @param{object} $event
    * @return{boolean/int} false if there's no end time, otherwise returns timestamp of the end time
    */
    public function getEndDateTimestamp($event) {
        if (!is_object($event)) return false;

        $date = $this->getDateProps($event, 'end');

        if ($date) {
            return strtotime($date);
        }

        return false;
    }

    /**
    * Get the event location
    * @param{object} $event
    * @return{boolean/string} false if there's no location, otherwise returns the location
    */
    public function getEventLocation($event) {
        if (!is_object($event)) return false;

        if (property_exists($event, 'location')) {
            return $event->location;
        }

        return '';
    }

    /**
    * Sort events by date into an array
    * @param{array} $events
    * @return{array} $sortedEvents
    */
    public function sortEventsByDate(Array $events) {
        $sortedEvents = [];

        foreach($events as $event) {
            $date = $this->getStartDateTimestamp($event);

            if ($date) {
                $sortedEvents[$date] = $event;
            } else {
                $sortedEvents['no_date'] = $event;
            }

        }

        return $sortedEvents;
    }

    /**
    * Throw a regular old exception
    * @param{string} $msg
    */
    private function exception($msg = '') {
        throw new \Exception('GCE: ' . ($msg ? $msg : 'Uh oh, there was an error. Please check your implementation of the GCE class.'));
    }
}