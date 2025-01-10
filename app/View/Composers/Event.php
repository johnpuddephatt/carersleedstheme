<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Event extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'events.single',

    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        global $post;
        return [
            'event' => $post,
        ];
    }
}
