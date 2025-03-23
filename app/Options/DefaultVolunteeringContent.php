<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class DefaultVolunteeringContent extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Default Volunteering Content';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'volunteering-content';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Default Volunteering Content | Options';



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
        $fields = Builder::make('default_volunteering_content');


        $fields
            ->addRepeater(
                'default_volunteering_sections',
                [
                    'label' => 'Application content',
                    'layout' => 'block',
                ]
            )

            ->addText('title')
            ->addWysiwyg('content', [
                'toolbar' => 'simple',
            ])
            ->endRepeater()
            ->addRepeater(
                'default_volunteering_faqs',
                [
                    'label' => 'Volunteering FAQs',
                    'layout' => 'block',
                ]
            )

            ->addText('title')
            ->addWysiwyg('content', [
                'toolbar' => 'simple',
            ])
            ->endRepeater();

        return $fields->build();
    }
}
