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
        $events_query = tribe_events()->where('series', $post->ID)->where('starts_after', 'now');
        return [
            'series' => $post,
            'event_count' => $events_query->per_page(9999)->count(),
            'per_page' => get_option('posts_per_page'),
            'events' => $events_query->page((int) get_query_var('paged'))
                ->all()
        ];
    }
}
