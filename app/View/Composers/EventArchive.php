<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class EventArchive extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-events',
        'events.default-template'
    ];

    public function with()
    {

        $events_query = tribe_events();

        // if (isset($_GET['date']) && $_GET['date'] == 'this_week') {
        //     $events_query->where('starts_after', now())->where('starts_before', date('Y-m-d', strtotime('next sunday')));
        // } elseif (isset($_GET['date']) && $_GET['date'] == 'next_week') {
        //     $events_query->where('starts_after', date('Y-m-d', strtotime('next monday')))->where('starts_before', date('Y-m-d', strtotime('next sunday +7 days')));
        // } else {

        // }

        $events_query->where('starts_after', now());

        if (isset($_GET['location'])  && $_GET['location'] !== 'all') {
            $events_query->where('meta_query', [
                [
                    'key' => 'event_location',
                    'value' => $_GET['location'],
                ],
            ]);
        }

        if (isset($_GET['type'])  && $_GET['type'] !== 'all') {
            $events_query->where('meta_query', [
                [
                    'key' => 'event_type',
                    'value' => $_GET['type'],
                ],
            ]);
        }

        if (isset($_GET['category']) && $_GET['category'] !== 'all') {
            $events_query->where('category', $_GET['category']);
        }
        // $events_query->where('category', 'bereavement');

        // $events_query->where('tribe_geoloc', true);
        // $events_query->where('tribe_geoloc_lat', '53.801277');
        // $events_query->where('tribe_geoloc_lng', '-1.548567');

        return [
            'content' => apply_filters('the_content', get_the_content(null, false)),
            'event_count' => $events_query->per_page(9999)->count(),
            'per_page' => get_option('posts_per_page'),
            'events' => $events_query
                ->per_page(get_option('posts_per_page'))
                ->page((int) get_query_var('paged'))
                ->all(),
        ];
    }
}
