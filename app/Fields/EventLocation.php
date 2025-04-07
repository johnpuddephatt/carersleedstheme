<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventLocation extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_location', ['position' => 'side', 'title' => 'Location']);

        $fields
            ->setLocation('post_type', '==', 'tribe_events')
            ->addSelect('event_location', [
                'label' => 'Location',
                'choices' => [
                    'north' => 'North Leeds',
                    'south' => 'South Leeds',
                    'east' => 'East Leeds',
                    'west' => 'West Leeds',
                    'centre' => 'Leeds City Centre',
                ],
                'default_value' => 'north',
            ]);

        return $fields->build();
    }
}
