<?php

namespace Modules\BaseCore\View\Components\Layout;

use Illuminate\View\Component;

class PanelSidebar extends Component
{
    /**
     * Get the views / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecore::components.layout.panel-sidebar');
    }
}
