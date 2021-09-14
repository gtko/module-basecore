<?php

namespace Modules\BaseCore\Contracts\Repositories;


interface CreateOrUpdateRepositoryContract
{
    public function createOrUpdate($modelTested, ...$params);
}
