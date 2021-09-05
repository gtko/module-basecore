<?php


namespace Modules\BaseCore\View\Directives;


use Illuminate\Support\Str;
use Modules\BaseCore\Icons\Icons;

class IconDirectiveBlade
{

    public function icon(string $name, mixed $size = '24', string $class = ''): string
    {
        return Icons::{Str::camel($name)}($size, $class);
    }

}
