<?php

namespace Modules\BaseCore\Interfaces;


use Illuminate\Database\Eloquent\Builder;

interface RepositoryQueryCustom
{

    public function setQuery(Builder $query):void;

}
