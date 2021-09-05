<?php

namespace Modules\BaseCore\Main;

use Modules\BaseCore\Contracts\Services\MenuContract;

class SideMenu
{
    public static function menu():array
    {
        return app(MenuContract::class)->menu();
    }
}
