<?php

namespace App\View\Composers;

use Args\get_posts;
use Roots\Acorn\View\Composer;

class Form extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [

        'blocks.form',

    ];

    public function with()
    {

        return [
            'form' => get_post($this->data->get('fields')->form_id),
            'form_fields' => carbon_get_post_meta($this->data->get('fields')->form_id, 'fields'),
        ];
    }
}
