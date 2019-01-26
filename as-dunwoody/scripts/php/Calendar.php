<?php

namespace Spine\scripts\php;

class Calendar {

    protected $feedInterface;
    protected $events;
    protected $start;
    protected $end;
    protected $interval;
    protected $range;
    protected $dates;
    protected $templatePath;

    /**
    * Class constructor, set initial/default values
    */
    public function __construct() {
        $this->feedInterface = new GCE();
        $this->interval = new \DateInterval('P1D');
        $this->start = new \DateTime();
        $this->end = new \DateTime();
        $this->start->setTimestamp(strtotime('now'));
        $this->end->setTimestamp(strtotime('+42 days')); // 7 * 6 grid default
        $this->templatePath = get_template_directory() . '/templates/partials/weekly-calendar.php';
        $this->setRange();
    }

    /**
    * Setter, check validity of passed in props & set
    * @param{property} $property
    * @param{*} $value
    * @return{boolean} returns false if property doesn't exist, or if $value is not valid
    */
    public function __set($prop, $value) {
        if (!property_exists($this, $prop)) {

            return $this->exception(
                'Cannot set non-existent property: ' . $prop
            );

            return false;
        }

        switch ($prop) {
            case 'start':
            case 'end':

                if (gettype($value) !== 'integer') {
                    
                    $this->exception('
                        The start/end time must be a timestamp!
                    ');

                    return false;

                }

                $this->$prop->setTimestamp($value);
                $this->setRange();

                break;

            case 'events':

                if (gettype($value) !== 'array') {

                    $this->exception('
                        Events must be an array!
                    ');

                    return false;

                }

                $this->events = $value;
            
            default:
                $this->$prop = $value;
                break;
        }
    }
    
    /**
    * Getter for object props
    * @param{*} $prop
    * @return{*} $prop
    */
    public function __get($prop) {
        if (!property_exists($this, $prop)) {

            return $this->exception(
                'Cannot get non-existent property: ' . $prop
            );

            return false;
        }
        
        return $this->$prop;
    }

    /**
    * Create a period of DateTime objects
    * @return{boolean/object} return false if missing props, otherwise return an DatePeriod object 
    */
    private function setRange() {
        if (isset($this->start) && isset($this->end) && isset($this->interval)) {
            return $this->range = new \DatePeriod($this->start, $this->interval, $this->end);
        }

        $this->exception('
            The start, end, and interval props must be set before setting the range!
        ');

        return false;
    }

    /**
    * Normalize event timestamps into a normal date format
    * @param{array} $events
    * @param{stirng} $format
    * @return{array} events
    */
    public function normalizeEventDates($events, $format) {
        return array_reduce(array_keys($events), function($arr, $key) use($events, $format) {

            $normalizedDate = new \DateTime();
            $normalizedDate->setTimestamp($key);

            $arr[$normalizedDate->format($format)] = $events[$key];

            return $arr;

        }, []);
    }

    /**
    * Create a new array from the current range and append event object if they have matching dates
    * @param{array} $events
    * @param{object} $dates
    * @return{array} range
    */
    public function appendEventsToDates(Array $events, $dates, $comparisonFormat = 'Y-m-d') {
        if (empty($events) || empty((array) $dates)) return;
        
        $datesArr = [];

        foreach($dates as $date) {
            $normalizedDate = $date->format($comparisonFormat);
            
            if (array_key_exists($normalizedDate, $events)) {
                $date->events[] = $events[$normalizedDate];
            }
            
            $datesArr[] = $date;

        }


        return $datesArr;
    }

    /**
    * Include and render out calendar template
    * @param{string} $templatePath
    * @return{string} markup
    */
    public function renderTemplate($templatePath) {
        ob_start();
        include $templatePath;
        return ob_get_clean();
    }

    /**
    * Throw a regular old exception
    * @param{string} $msg
    */
    private function exception($msg = '') {
        throw new \Exception('Calendar: ' . ($msg ? $msg : 'Uh oh, there was an error. Please check your implementation of the Calendar class.'));
    }
}