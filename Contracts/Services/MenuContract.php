<?php

namespace Modules\BaseCore\Contracts\Services;

use Modules\BaseCore\Entities\MenuItem;

Interface MenuContract{

    /**
     * @return array<int, \Modules\BaseCore\Entities\MenuItem>
     */
    public function menu():array;

    public function addItem(MenuItem $item): MenuContract;
}
