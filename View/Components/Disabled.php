<?php

namespace Modules\BaseCore\View\Components;

use Illuminate\View\Component;

class Disabled extends Component
{

    public function __construct(
        public array $disabled = [],
        public string $fieldName = ''
    ){

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.disabled', [
            'show' => !in_array($this->fieldName, $this->disabled, true)
        ]);
    }
}
