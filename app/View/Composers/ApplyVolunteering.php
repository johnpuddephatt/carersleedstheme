<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ApplyVolunteering extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-volunteer-apply'
    ];

    public function with()
    {
        return [
            'title' => 'My apply page',
            'content' => apply_filters('the_content', get_the_content(null, false, get_option('page_for_volunteering_applications', true))),
            // 'excerpt' =>  get_the_excerpt(get_option('page_for_posts', true)),
            // 'page_id' => get_option('page_for_posts', true),
            // 'page' => get_post(get_option('page_for_posts', true)),
        ];
    }
}
