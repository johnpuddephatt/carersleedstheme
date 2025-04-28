<?php

namespace App\Blocks;

use Carbon_Fields\Container\Condition\Condition;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class EventSignpost extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Event';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Use to link to a event';

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
    public $icon = 'editor-ul';

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
    // public $styles = ['light', 'dark'];

    /**
     * The block preview example data.
     *
     * @var array
     */
    // public $example = [
    //     'items' => [
    //         ['item' => 'Item one'],
    //         ['item' => 'Item two'],
    //         ['item' => 'Item three'],
    //     ],
    // ];

    /**
     * The block template.
     *
     * @var array
     */
    // public $template = [
    //     'core/heading' => ['placeholder' => 'Hello World'],
    //     'core/paragraph' => ['placeholder' => 'Welcome to the Signpost block.'],
    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        // return [
        //     'post_signpost' => null
        // ];
        if (get_field('type') === 'next') {

            $query = [
                'posts_per_page' => 1,
                'start_date' => 'now',
            ];

            if (get_field('event_type') && get_field('event_type') !== 'any') {
                $query['meta_query'] = [
                    [
                        'key' => 'event_type',
                        'value' => get_field('event_type'),
                    ],
                ];
            }

            return [
                'heading' => get_field('heading'),
                'empty_message' => get_field('empty_message'),
                'hide_when_empty' => get_field('hide_when_empty'),
                'event_signpost' => tribe_get_events($query)[0] ?? null
            ];
        }


        return [
            'heading' => get_field('heading'),
            'empty_message' => get_field('empty_message'),
            'hide_when_empty' => get_field('hide_when_empty'),
            'event_signpost' => (get_field('event') ? get_post(get_field('event')) : null)
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_signpost');

        $fields

            ->addText('heading')

            ->addTrueFalse('hide_when_empty', [
                'label' => 'Hide when empty',
                'ui' => 1
            ])

            ->addText('empty_message', [
                'label' => 'Message when empty',
                'default_value' => 'No events found',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'hide_when_empty',
                            'operator' => '==',
                            'value' => 0,
                        ],
                    ],
                ],
            ])

            ->addSelect('type', [
                'label' => 'Type',
                'choices' => [
                    'next' => 'Next event',
                    'specific' => 'Specific event',
                ],
            ])

            ->addSelect('event_type', [
                'label' => 'Event type',
                'choices' => [
                    'any' => 'Any',
                    'workshop' => 'Workshop',
                    'social' => 'Social',
                    'advice' => 'Advice',
                ],
            ])

            ->addPostObject('event', [
                'label' => 'Event',
                'post_type' => ['tribe_events'],
                'return_format' => 'id',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'specific',
                        ],
                    ],
                ],
            ])

            ->addTaxonomy('category', [
                'taxonomy' => 'tribe_events_cat',
                'field_type' => 'select',
                'allow_null' => true,
                'required' => false,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'next',
                        ],
                    ],
                ],
            ]);

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    // public function items()
    // {
    //     return get_field('items') ?: $this->example['items'];
    // }

    /**
     * Assets enqueued when rendering the block.
     */
    // public function assets(array $block): void
    // {
    //     //
    // }
}
