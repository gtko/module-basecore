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

    protected function getListeners(){
        return [
            $this->getKey().':open' => 'open',
            $this->getKey().':close' => 'close',
            $this->getKey().':toggle' => 'toggle',
        ];
    }

    abstract public function getKey():string;

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function open()
    {
        $this->isOpen = true;
    }
}
