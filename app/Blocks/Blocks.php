<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Blocks extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Blocks';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add a row of blocks';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'reusable';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'grid-view';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => false,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];



    /**
     * The block styles.
     *
     * @var array
     */
    // public $styles = ['default', 'compact'];

    /**
     * The block preview example data.
     *
     * @var array
     */


    /**
     * The block template.
     *
     * @var array
     */
    // public $template = [
    //     'core/heading' => ['placeholder' => 'Heading',],
    //     'core/paragraph' => [
    //         'placeholder' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    //     ],
    //     'core/buttons' => ['placeholder' => 'Buttons', 'lock' => [
    //         'move'   => true,
    //         'remove' => true,
    //         'innerBlocks' => [
    //             [
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //             ],

    //         ],
    //     ]],


    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => get_field('title'),
            'subtitle' => get_field('subtitle'),
            // 'background_colour' => get_field('background_colour'),
            'blocks' => get_field('blocks'),
            'more_link' => get_field('read_more_link'),
            'display_default_contact_info' => get_field('display_default_contact_info'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('blocks');

        $fields
            ->addTrueFalse('display_default_contact_info', [
                'label' => 'Display default contact info',
                'ui' => 1,
                'default_value' => 1,
                'instructions' => 'This will display the default contact info as defined in Theme Options. If you want to override the default contact info, set this to No and fill in the fields below.',
            ])
            ->addText('title', [
                'conditional_logic' => [
                    [
                        [
                            'field' => 'display_default_contact_info',
                            'operator' => '==',
                            'value' => 0,
                        ],
                    ],

                ]
            ])
            ->addText('subtitle', [
                'conditional_logic' => [
                    [
                        [
                            'field' => 'display_default_contact_info',
                            'operator' => '==',
                            'value' => 0,
                        ],
                    ],

                ]
            ])
            // ->addPartial(\App\Fields\Partials\BackgroundColor::class)

            ->addLink('read_more_link', [
                'conditional_logic' => [
                    [
                        [
                            'field' => 'display_default_contact_info',
                            'operator' => '==',
                            'value' => 0,
                        ],
                    ],

                ]
            ])

            ->addFlexibleContent('blocks', [
                'layout' => 'block',
                'button_label' => 'Add Block',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'display_default_contact_info',
                            'operator' => '==',
                            'value' => 0,
                        ],
                    ],

                ]
            ])

            ->addLayout('block', [
                'label' => 'Block',
            ])

            ->addWysiwyg(
                'heading',
                [
                    'tabs' => 'visual',
                    'toolbar' => 'simple',
                    'media_upload' => 0,
                ]
            )
            ->addWysiwyg('subheading', [
                'tabs' => 'visual',
                'toolbar' => 'simple',
                'media_upload' => 0,
            ])
            // ->addUrl('link')
            ->addField('icon', 'svg_icon_picker', [
                'label'         => 'Icon',
                'return_format' => 'value', // or 'icon'
            ])

            ->endFlexibleContent();



        return $fields->build();
    }


    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
