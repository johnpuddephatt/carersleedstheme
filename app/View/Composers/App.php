<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['*'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'primaryNavigation' => $this->primaryNavigation(),
            'secondaryNavigation' => $this->secondaryNavigation(),
            'footerNavigation' => $this->footerNavigation(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function primaryNavigation()
    {
        $navigation = (new Navi())->build('primary_navigation');

        if ($navigation->isEmpty()) {
            return;
        }

        return $navigation->toArray();
    }

    public function secondaryNavigation()
    {
        $navigation = (new Navi())->build('secondary_navigation');

        if ($navigation->isEmpty()) {
            return;
        }

        return $navigation->toArray();
    }

    public function footerNavigation()
    {
        $navigation = (new Navi())->build('footer_navigation');

        if ($navigation->isEmpty()) {
            return;
        }

        return $navigation->toArray();
    }
}
