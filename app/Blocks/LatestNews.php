<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class LatestNews extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Latest News';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Latest news';

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
    public $icon = 'document';

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
            'news' => get_posts([
                'posts_per_page' => get_field('number'),
                'featured' => get_field('featured'),
                'post_type' => 'post',
            ]),
            'read_more_link' => get_field('read_more_link'),
            'background_color' => get_field('background_color'),
            'show_excerpt' => get_field('show_excerpt'),
            'show_image' => get_field('show_image'),

        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('latest_events');

        $fields
            ->addPartial(\App\Fields\Partials\BackgroundColor::class)
            ->addText('title')
            // ->addTaxonomy('category', [
            //     'taxonomy' => 'tribe_events_cat',
            //     'field_type' => 'select',
            //     'allow_null' => true,
            //     'required' => false,
            // ])
            ->addNumber('number', [
                'default_value' => 4,
                'min' => 1,
                'max' => 10,
            ])
            ->addTrueFalse('featured')
            ->addTrueFalse('show_excerpt')
            ->addTrueFalse('show_image', [
                'default_value' => true,
            ])
            ->addLink('read_more_link');
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
