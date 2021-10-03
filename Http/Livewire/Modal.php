<?php

namespace Modules\BaseCore\Http\Livewire;

use Livewire\Component;
use Modules\BaseCore\Entities\TypeView;

class Modal extends AbstractModal
{

    public string $name = '';
    public string $type = '';
    public string $path = '';
    public array $arguments = [];

    public function mount(string $name, string $type = '', string $path = '', array $arguments = []){
        $this->name = $name;
        $this->type = $type;
        $this->path = $path;
        $this->arguments = $arguments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::livewire.modal', [
            'typeView' => new TypeView($this->type, $this->path)
        ]);
    }

    public function getKey(): string
    {
        return $this->name;
    }
}
