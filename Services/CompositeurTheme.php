<?php

namespace Modules\BaseCore\Services;

use Illuminate\Support\Collection;
use Modules\BaseCore\Contracts\Services\CompositeurThemeContract;

class CompositeurTheme implements CompositeurThemeContract
{
    private array $hooks;

    public function __construct()
    {
        $this->hooks = [];
    }

    public function has($contractViewClass): bool
    {
        return array_key_exists($contractViewClass, $this->hooks);
    }

    /**
     * @inheritDoc
     */
    public function getViews($contractViewClass): Collection
    {
        return collect($this->hooks[$contractViewClass] ?? []);
    }

    /**
     * @inheritDoc
     */
    public function setViews($contractViewClass, array|string $typeViews, string $key = null): CompositeurThemeContract
    {
        if(!$this->has($contractViewClass)){
            $this->hooks[$contractViewClass] = [];
        }

        $key = ($key) ?: uniqid('key_', true);

        if(is_array($typeViews)){
            $this->hooks[$contractViewClass] = array_merge($this->hooks[$contractViewClass], $typeViews);
        }else{
            $this->hooks[$contractViewClass][$key] = $typeViews;
        }

        return $this;
    }
}
