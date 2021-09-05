<?php

namespace Modules\BaseCore\Contracts\Services;

use Illuminate\Support\Collection;

interface CompositeurThemeContract
{
    public function has($contractViewClass):bool;

    /**
     * @param $contractViewClass
     * @return Collection<int, \Modules\BaseCore\Entities\TypeView>
     */
    public function getViews($contractViewClass): Collection;

    /**
     * @param $contractViewClass
     * @param string|array $typeViews
     */
    public function setViews($contractViewClass, string|array $typeViews, string $key = null): CompositeurThemeContract;
}
