<?php

namespace Modules\BaseCore\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Modules\BaseCore\Contracts\Services\CompositeurThemeContract;
use Modules\BaseCore\Entities\TypeView;

class ResolveTypeView extends Component
{

    /**
     * @var Collection<int, TypeView>
     */
    public Collection $typeViews;
    public array $arguments;

    public function __construct(CompositeurThemeContract $compositeur, string $contratViewClass, array $arguments)
    {
        if($compositeur->has($contratViewClass)) {
            $this->typeViews = $compositeur->getViews($contratViewClass);
        }else{
            $this->typeViews = collect([]);
        }

        $this->arguments = ($arguments);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function render(): \Illuminate\Contracts\View\View|Factory|Application
    {

        return view('basecore::components.resolve-type-view');
    }
}
