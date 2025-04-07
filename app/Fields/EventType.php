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
                'choices' => [
                    '' => 'Select an event type',
                    'social' => 'Socials & meet-ups',
                    'workshop' => 'Workshops',
                    'advice' => 'Drop-in advice',
                    'other' => 'Other',
                ],
                'default_value' => 'social',
            ]);

        return $fields->build();
    }
}
