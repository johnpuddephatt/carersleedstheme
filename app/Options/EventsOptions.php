<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class EventsOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Events';

    public $slug = 'event-options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Event options | Options';

    public $parent = 'theme-options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {


        $fields = Builder::make('Event types');

        $fields

            ->addRepeater('event_types', [
                'label' => 'Event types',
                'layout' => 'block',
            ])
            ->addText('slug')

            ->addText('title')
            ->addText('description')

            ->addImage(
                'image',
                [
                    'return_format' => 'id'
                ]
            )
            ->endRepeater()

        ;



        return $fields->build();
    }
}
