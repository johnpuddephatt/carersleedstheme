<?php

namespace App\Blocks;

use Carbon_Fields\Container\Condition\Condition;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class PostSignpost extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Post';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Use to link to a post';

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
        if (get_field('type') === 'latest') {
            return [
                'post_signpost' => get_posts([
                    'posts_per_page' => 1,
                    'post_type' => 'post',
                    'category' => get_field('category') ?? null,
                    'order'            => 'DESC',
                    'date_query' => [
                        'after' => (get_field('maximum_age') ? date('Y-m-d', strtotime('-' . get_field('maximum_age') . ' days')) : null)
                    ]
                ])[0] ?? null
            ];
        }


        return [
            'post_signpost' => (get_field('post') ? get_post(get_field('post')) : null)
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('post_signpost');

        $fields
            ->addSelect('type', [
                'label' => 'Type',
                'choices' => [
                    'latest' => 'Latest',
                    'specific' => 'Specific',
                ],
            ])

            ->addPostObject('post', [
                'label' => 'Post',
                'post_type' => ['post'],
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
                'taxonomy' => 'category',
                'field_type' => 'select',
                'allow_null' => true,
                'required' => false,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'latest',
                        ],
                    ],
                ],
            ])

            ->addNumber('maximum_age', [
                'label' => 'Maximum Age in days',
                'default_value' => 90,
                'min' => 1,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'type',
                            'operator' => '==',
                            'value' => 'latest',
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
