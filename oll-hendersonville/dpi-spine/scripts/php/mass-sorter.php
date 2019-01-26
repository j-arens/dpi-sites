<?php

class MassSorter {

    /**
    * Class construct
    */
    public function __construct() {
         add_shortcode('dpi_mass_times', [$this, 'shortcodeHandler']);
     }

     /**
     * Get all mass times from db
     */
     private function getMassTimes() {
         return carbon_get_theme_option('mass_times', 'complex');
     }

     /**
     * Filter mass times by category
     */
     private function filterByCat($massTimes, $cat) {
         return array_filter($massTimes, function($massTime) use($cat) {
            return $cat && in_array($massTime['mass_type'], $cat) ? true : false;
         });
     }

     /**
     * Convert time string to date object
     */
     private function convertToUnixTime($massTimes) {
         return array_map(function($massTime) {
             return DateTime::createFromFormat('l G:i a', $massTime['mass_day'] . ' ' . $massTime['mass_time']);
         }, $massTimes);
     }

     /**
     * Get spanish translation for english day
     */
     private function translateDay($day) {
          switch ($day) {
                case 'Monday':
                    return 'Lunes';
                case 'Tuesday':
                    return 'Martes';
                case 'Wednesday':
                    return 'Miércoles';
                case 'Thursday':
                    return 'Jueves';
                case 'Friday':
                    return 'Viernes';
                case 'Saturday':
                    return 'Sábado';
                case 'Sunday':
                    return 'Domingo';
            }
      }

      /**
      * Generate the markup for a time element
      */
      private function generateTimeItem($time, $spanish = false) {
         return '
            <time class="mass-times--item_time" datetime="">
                <span class="mass-times--item_time-day">
                    ' . ($spanish ? $this->translateDay(date('l', $time->getTimeStamp())) : date('l', $time->getTimeStamp())) . '
                </span>
                <span class="mass-times--item_time-hour">
                    ' . date('g:i a', $time->getTimeStamp()) . '
                </span>
            </time>
         ';
     }

     /**
     * Sort mass times and return the next scheduled time compared to right now
     */
     private function getNextMassTime($massTimes, $cat = []) {
        $futureTimes = '';
        $currentTime = new DateTime('now');
        
        if ($cat) $massTimes = $this->filterByCat($massTimes, $cat);
        
        if (count($massTimes) > 1) {
            $futureTimes = array_filter($this->convertToUnixTime($massTimes), function($time) use($currentTime) {
               return $time > $currentTime;
            });
        } else {
            $futureTimes = $this->convertToUnixTime($massTimes);
        }
        
        return min($futureTimes);
     }

     /**
     * Filter, process, and return the markup for weekend mass times
     */
     private function getWeekendMassTimes($massTimes) {
         $weekend = $this->convertToUnixTime($this->filterByCat($massTimes, ['weekend']));
         $markup = '';
         
         usort($weekend, function($a, $b) {
            return $a > $b ? 1 : -1; 
         });
         
         foreach($weekend as $time) {
             $markup .= $this->generateTimeItem($time);
         }
         
         return $markup;
     }

     /**
     * Generate the mass times markup
     */
     private function generateMarkup($link) {
         $massTimes = $this->getMassTimes();

         if (empty($massTimes)) return;

         $next = $this->getNextMassTime($massTimes, ['weekend', 'weekday']);
         $nextSpanish = $this->getNextMassTime($massTimes, ['spanish']);
         
         return '
            <div class="mass-times--container">
                <div class="mass-times--item_placard">
                    <p class="mass-times--item_placard-title font-yk">
                        Mass Times
                    </p>
                    <a href="' . esc_url($link) . '" class="mass-times--item-placard_link font-bold">View Full Schedule ></a>
                </div>
                <ul class="mass-times--list">
                    <li class="mass-times--list_item">
                        <p class="mass-times--item_title font-yk">
                            Next
                        </p>
                        ' . $this->generateTimeItem($next) . '
                    </li>
                    <li class="mass-times--list_item">
                        <p class="mass-times--item_title font-yk">
                            Weekend
                        </p>
                        ' . $this->getWeekendMassTimes($massTimes) . '
                    </li>
                    <li class="mass-times--list_item">
                        <p class="mass-times--item_title font-yk">
                            Español
                        </p>
                        ' . $this->generateTimeItem($nextSpanish, true) . '
                    </li>
                </ul>
            </div>
         ';
     }

     /**
     * Shortcode callback
     */
     public function shortcodeHandler($atts) {
         extract(shortcode_atts([
             'link' => '#'
         ], $atts));
         
         return $this->generateMarkup(sanitize_text_field($link));
     }
}

if (!is_admin()) {
    $sorter = new MassSorter();
}

/*

Sunday - 11:00 AM
Friday - 6:30 AM
Thursday - 9:15 AM
Wednesday - 9:15 AM
Tuesday - 9:15 AM
Monday - 9:15 AM
Sunday - 6:00 PM SPANISH
Sunday - 8:30 AM
Saturday - 5:00 PM

*/