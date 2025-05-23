<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class File extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'File';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Display a file to download';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'media';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'category';

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
    //     'core/paragraph' => ['placeholder' => 'Welcome to the File block.'],
    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {


        return [
            // 'items' => $this->items(),
            'file' => get_field('file'),
            'name' => get_field('name'),
            'description' => get_field('description'),

        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('file');

        $fields->addFile('file')
            ->setLabel('File')
            ->setRequired();

        $fields->addText('name')->setInstructions('Leave blank to use the default file name');

        $fields->addTextarea('description', [
            'rows' => 2,
        ])->setInstructions('Leave blank to use the default file description');


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
