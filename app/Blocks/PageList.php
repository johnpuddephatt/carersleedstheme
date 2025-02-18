<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class PageList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Page list (A-Z)';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Used to list all of a pages children alphabetically';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'widget';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'admin-page';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['pages', 'a-z', 'alphabetical', 'list', 'children'];

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
    public $styles = ['default', 'compact'];

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

            'pages' => wp_list_pages([
                'title_li' => null,
                'depth' => 999,
                'echo' => false,
                'child_of' => get_field('page'),
                'sort_column' => 'title'
            ]),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('pages_alphabetical');

        $fields
            ->addPostObject('page', [
                'post_type' => ['page'],
                'return_format' => 'id',
            ]);

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
