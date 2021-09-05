<?php

namespace Modules\BaseCore\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\BaseCore\Icons\Icons;

class IconDevController extends Controller
{
    public function index()
    {
        $icons = (new Icons())->getAll();
        return view('basecore::IconDev', compact('icons'));
    }
}
