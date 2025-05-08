<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class EventSeries extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'events.summary',

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
            'series' => $post,
            'events' => tribe_events()->where('series', $post->ID)->where('starts_after', 'now')->all()

        ];
    }
}
