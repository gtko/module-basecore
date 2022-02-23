<?php

namespace Modules\BaseCore\View\Composers;

use Illuminate\View\View;
use Modules\BaseCore\Services\DarkModeService;

class DarkModeComposer
{
    /**
     * Bind data to the views.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('dark_mode',app(DarkModeService::class)->isDarkMode());
    }
}
