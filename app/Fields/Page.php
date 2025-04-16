<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Page extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('show_cta', ['position' => 'side', 'title' => 'Show Call to Action?']);

        $fields
            ->setLocation('post_type', '==', 'page')
            ->addTrueFalse('show_cta', [
                'label' => 'Show "Get in touch" boxes at bottom of page?',
                'default_value' => 0,
                'ui' => 1,
            ])
            ->addTrueFalse('show_exit', [
                'label' => 'Show "Exit this page" button when viewing this page?',
                'default_value' => 0,
                'ui' => 1,
            ]);

        return $fields->build();
    }
}
