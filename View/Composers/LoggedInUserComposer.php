<?php

namespace Modules\BaseCore\View\Composers;

use Illuminate\View\View;
use Modules\BaseCore\Faker;

class LoggedInUserComposer
{
    /**
     * Bind data to the views.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('loggedin_user', request()->user());
    }
}
