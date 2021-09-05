<?php

namespace Modules\BaseCore\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\BaseCore\Icons\Icons;

class IconDevController extends Controller
{
    public function index()
    {
        if(env('APP_ENV') !== 'local'){
            abort(404);
        }

        $icons = (new Icons())->getAll();
        return view('basecore::IconDev', compact('icons'));
    }
}
