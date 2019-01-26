<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class EventDates extends CustomFields {

    public function dateFields() {
        $fields = [
            Field::make('date', 'news_event_start', 'Event Date')
        ];

        return Container::make('post_meta', 'Event Date')
            ->show_on_post_type('news')
            ->set_context('side')
            ->add_fields($fields);
    }

}

$eventDates = new EventDates();