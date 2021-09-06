<?php

namespace Modules\BaseCore\Entities;

use Illuminate\Support\Str;
use Modules\BaseCore\Contracts\Services\FeaturesContract;

class Features implements FeaturesContract
{
    protected array $config = [];
    protected array $features = [];

    public function __construct(){
        $this->setKeyConfig('basecore.features');
    }

    public function available(string $name):bool
    {
        return in_array(Str::snake($name), $this->features, true);
    }

    public function unavailable(string $name):bool
    {
        return !$this->available($name);
    }

    public function setKeyConfig(string $key):void
    {
        $this->config[] = $key;
        $this->loadFeatures();
    }

    private function loadFeatures(): void
    {
        $this->features = [];
        foreach($this->config as $key){
            $this->features += config($key, []);
        }
    }


    public function protected(string $name, string $routeName): void
    {
        $request = request();
        if($this->unavailable($name) && $request->route()->getName() === $routeName){
            abort('404');
        }
    }
}
