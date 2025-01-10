<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class VacancyArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-vacancies',
    ];

    public function with()
    {

        $currentPage = $_GET['page_number'] ?? 1;

        return [
            "vacancies" => new \WP_Query([
                'post_type' => 'vacancy',
                'paged' => (int) $currentPage,
            ]),
        ];
    }
}
