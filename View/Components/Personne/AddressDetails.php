<?php

namespace Modules\BaseCore\View\Components\Personne;

use Illuminate\View\Component;
use Modules\BaseCore\Interfaces\TypePersonne;

class AddressDetails extends Component
{

    public function __construct(
      public TypePersonne $personne
    ){}

    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.personne.address-details');
    }
}
