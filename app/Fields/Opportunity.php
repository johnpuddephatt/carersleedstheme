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
        $fields = Builder::make('opportunity', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'opportunity')
            ->addDatePicker('deadline')
            ->addText('contract_type')
            ->addText('salary')
            ->addText('hours')
            ->addText('location');


        return $fields->build();
    }
}
