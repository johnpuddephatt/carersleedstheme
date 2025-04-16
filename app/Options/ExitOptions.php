<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ExitOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme options';

    public $slug = 'theme-options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'General options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {


        $fields = Builder::make('Exit link');

        $fields


            ->addUrl('exit_url', [
                'label' => 'Exit URL',
                'instructions' => 'URL to redirect to when the "Exit this page" button is clicked.',
            ]);



        return $fields->build();
    }
}
