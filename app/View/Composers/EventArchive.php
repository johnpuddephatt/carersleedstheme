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

        if (isset($_GET['date']) && $_GET['date'] == 'this_week') {
            $events_query->where('starts_after', now())->where('starts_before', date('Y-m-d', strtotime('next sunday')));
        } elseif (isset($_GET['date']) && $_GET['date'] == 'next_week') {
            $events_query->where('starts_after', date('Y-m-d', strtotime('next monday')))->where('starts_before', date('Y-m-d', strtotime('next sunday +7 days')));
        } else {
            $events_query->where('starts_after', now());
        }



        // $events = $events_query->all();



        return [


            'content' => apply_filters('the_content', get_the_content(null, false)),
            'event_count' => $events_query->per_page(9999)->count(),
            'per_page' => get_option('posts_per_page'),
            'events' => $events_query
                ->per_page(get_option('posts_per_page'))
                ->page((int) get_query_var('paged'))
                ->all(),


            // 'per_page' => $events_query->per_page(),



            // "events" => new \WP_Query([
            //     'post_type' => 'tribe_events',
            //     'paged' => (int) get_query_var('paged'),
            //     'orderby' => ['start_date' => 'ASC'],
            //     'meta_query' => [

            //         'relation' => 'OR',

            //         [
            //             'key' => '_EventHideFromUpcoming',
            //             'compare' => 'NOT EXISTS'
            //         ],
            //         [
            //             'key' => '_EventHideFromUpcoming',
            //             'compare' => '!=',
            //             'value' => 'yes'
            //         ]
            //     ],
            // ]),

        ];
    }
}
