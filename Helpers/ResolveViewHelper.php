<?php

namespace Modules\BaseCore\Helpers;

use Modules\BaseCore\Contracts\Services\CompositeurThemeContract;

class ResolveViewHelper
{

    public static function exists(string $contratViewClass){
        $compositeur = app(CompositeurThemeContract::class);

        return $compositeur->has($contratViewClass);
    }


}
