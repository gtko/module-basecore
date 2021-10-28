<?php

namespace Modules\BaseCore\Http\Livewire;

use Livewire\Component;

abstract class AbstractModal extends Component
{

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public $isOpen = false;
    public array $arguments = [];

    protected function getListeners(){
        return [
            $this->getKey().':open' => 'open',
            $this->getKey().':close' => 'close',
            $this->getKey().':toggle' => 'toggle',
        ];
    }

    abstract public function getKey():string;

    public function toggle(array $arguments = [])
    {
        $this->arguments = $arguments;
        $this->isOpen = !$this->isOpen;
    }

    public function close(array $arguments = [])
    {
        $this->arguments = $arguments;
        $this->isOpen = false;
    }

    public function open(array $arguments = [])
    {
        $this->arguments = $arguments;
        $this->isOpen = true;
    }
}
