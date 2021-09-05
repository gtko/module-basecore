<?php

namespace Modules\BaseCore\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryFetchable
{
    public function all():Collection;

    public function fetchAll(int $limit = 50):LengthAwarePaginator;
    public function fetchSearch(string $value, int $limit = 50):LengthAwarePaginator;

    public function fetchById(int $id):Model;
}
