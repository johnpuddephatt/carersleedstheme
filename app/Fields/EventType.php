<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventType extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_type', ['position' => 'side', 'title' => 'Event type']);
        $fields
            ->setLocation('post_type', '==', 'tribe_events')
            ->addSelect('event_type', [
                'label' => 'Type',
                'choices' => array_merge(
                    [
                        '' => 'Select an event type'
                    ],
                    array_column(get_field('event_types', 'option'), 'title', 'slug'),
                    [
                        'other' => 'Other'
                    ]
                ),
                'default_value' => 'social',
            ]);

        return $fields->build();
    }
}
