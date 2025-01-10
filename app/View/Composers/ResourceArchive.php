<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ResourceArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-resources',
    ];

    public function with()
    {


        $tax_query = [];

        if (isset($_GET['type']) && $_GET['type']) {
            $tax_query[] = [
                'taxonomy' => 'resource_type',
                'field' => 'id',
                'terms' => $_GET['type'],
            ];
        };

        $meta_query = [];

        if (isset($_GET['key_issue']) && $_GET['key_issue']) {
            $meta_query[] = [
                'key' => 'issues',
                'value' => 'post:issue:' . $_GET['key_issue'],
            ];
        };

        $currentPage = $_GET['page_number'] ?? 1;



        return [
            'results_title' => $this->get_results_title(),
            "resources" => new \WP_Query([
                'post_type' => 'resource',
                'paged' => (int) $currentPage,
                "s" => $_GET['search'] ?? null,
                'order' => isset($_GET['order']) ? $_GET['order'] : 'DESC',
                'meta_query' => $meta_query,
                'tax_query' => $tax_query
            ]),
            // "post" => get_post(get_option('page_for_resources')),
            "types" => get_terms([
                'taxonomy' => 'resource_type',
                'hide_empty' => false,
            ]),
            "key_issues" => get_posts([
                'post_type' => 'issue',
                'numberposts' => -1,
                'meta_query' => [
                    [
                        'key' => 'featured',
                        'value' => 1,
                        'compare' => '='
                    ]
                ]
            ]),
            "issues" => get_posts([
                'post_type' => 'issue',
                'numberposts' => -1,
                'meta_query' => [
                    [
                        'key' => 'featured',
                        'value' => 0,
                        'compare' => '='
                    ]
                ]
            ])
        ];
    }

    public function get_results_title()
    {
        $count = 0;
        $title = 'Latest resources';

        if (isset($_GET['search']) && $_GET['search']) {
            $title =  'Search results for "' . $_GET['search'] . '"';
            $count++;
        }
        if (isset($_GET['type']) && $_GET['type']) {
            $term = get_term($_GET['type'], 'resource_type');
            $title =  $term->name;
            $count++;
        }
        if (isset($_GET['key_issue']) && $_GET['key_issue']) {

            $title =  get_the_title($_GET['key_issue']);
            $count++;
        }


        if ($count > 1) {
            $title = 'Search results (multiple filters applied)';
        }

        return $title;
    }
}
