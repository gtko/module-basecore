<?php

namespace Modules\BaseCore\Contracts\Services;

interface ThemeContract
{
    public function getName():string;

    public function getPath():string;
}
