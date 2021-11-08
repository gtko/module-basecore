<?php

namespace Modules\BaseCore\View\Components;

use Illuminate\View\Component;

class ListInputs extends Component
{

    public function __construct(
        public string $name,
        public array $items = []
    ){}

    public function render()
    {
        return view('basecore::components.list-inputs');
    }
}
