<?php

namespace Modules\BaseCore\Contracts\Views;

use Modules\BaseCore\Entities\TypeView;

interface ViewContract
{
    public function getTypeView():TypeView;
}
