<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Volunteering extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('volunteering', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'volunteering')
            ->addText('location')
            ->addText('hours')
            ->addDateTimePicker('deadline', [
                'return_format' => 'Y-m-d H:i:s',
                'required' => true
            ]);

        return $fields->build();
    }
}
