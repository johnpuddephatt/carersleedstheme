<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class SearchOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Search';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'search';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Search | Options';



    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'theme-options';


    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('search_options');

        $fields->addText('algolia_app_id', ['label' => 'Algolia App ID']);
        $fields->addText('algolia_api_key', ['label' => 'Algolia API Key']);

        return $fields->build();
    }
}
