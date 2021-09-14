<?php

namespace Modules\BaseCore\View\Components\Personne;

use Illuminate\View\Component;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Country;

class Form extends Component
{

    public function __construct(
        public ?TypePersonne $personne = null,
        public bool $editing = false,
        public array $disabledFields = []
    ){}

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(): string|\Illuminate\View\View
    {
        $countries = Country::orderby('name', 'asc')->get();
        return view('basecore::components.personne.form', compact('countries'));
    }
}
