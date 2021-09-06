<?php

namespace Modules\BaseCore\Contracts\Entities;


interface FeaturesContract
{
    public function available(string $name):bool;
    public function unavailable(string $name):bool;
    public function setKeyConfig(string $key);

    public function protected(string $name, string $routeName):void;
}
