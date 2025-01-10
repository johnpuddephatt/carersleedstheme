<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NewsArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index'
    ];

    public function with()
    {
        return [
            'content' => apply_filters('the_content', get_the_content(null, false, get_option('page_for_posts', true))),
            // 'excerpt' =>  get_the_excerpt(get_option('page_for_posts', true)),
            // 'page_id' => get_option('page_for_posts', true),
            // 'page' => get_post(get_option('page_for_posts', true)),
        ];
    }
}
