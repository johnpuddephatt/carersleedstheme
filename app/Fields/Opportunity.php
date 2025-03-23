<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Opportunity extends Field
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
            ->addText('hours');

        return $fields->build();
    }
}
