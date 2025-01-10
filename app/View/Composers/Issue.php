<?php

namespace App\View\Composers;

use Args\get_posts;
use Roots\Acorn\View\Composer;

class Issue extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [

        'partials.content-single-issue',

    ];

    public function with()
    {

        return [
            'resources' => get_posts([
                'post_type' => 'resource',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'meta_query' => [
                    [
                        'key' => 'issues',
                        'value' => 'post:issue:' . get_the_ID(),
                    ],
                ]
            ]),
        ];
    }
}
