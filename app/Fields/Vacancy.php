<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Vacancy extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('vacancy', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'opportunity')
            ->addDatePicker('closing_date')
            ->addText('contract_type')
            ->addText('salary')
            ->addText('hours')
            ->addText('location')
            ->addText('interview_date')
        ;

        return $fields->build();
    }
}
