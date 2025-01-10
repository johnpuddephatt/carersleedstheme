<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class LinkSignpost extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Link Signpost';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Link to a page or URL';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'widgets';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'admin-links';

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
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => false,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];


    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => get_field('title') ?: (get_field('page') ?  get_the_title(get_field('page')) : null),
            'description' => get_field('description') ?: (get_field('page') ? get_the_excerpt(get_field('page')) : null),
            'link' => get_field('link') ?:  get_permalink(get_field('page'))

        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('link_signpost');

        $fields
            ->addSelect('type', [
                'choices' => [
                    'page' => 'Page',
                    'url' => 'URL',
                ],
            ])

            ->addPostObject('page', [
                'post_type' => ['page'],
                'return_format' => 'id',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'page',
                        ],
                    ],
                ],
            ])
            ->addTrueFalse('override_details', [
                'ui' => 1,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'page',
                        ],
                    ],
                ],
            ])
            ->addText(
                'title',
                [
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'override_details',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                        [
                            [
                                'field' => 'type',
                                'operator' => '==',
                                'value' => 'url',
                            ],
                        ],
                    ],
                ]
            )

            ->addTextarea(
                'description',
                [
                    'rows' => 2,
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'override_details',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                        [
                            [
                                'field' => 'type',
                                'operator' => '==',
                                'value' => 'url',
                            ],
                        ],
                    ],
                ]
            )


            ->addUrl('link', [
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'url',
                        ],
                    ],
                ],
            ]);

        return $fields->build();
    }
}
