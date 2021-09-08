<?php

namespace Modules\BaseCore\Http\Controllers;

use App\Http\Controllers\Controller;

class FormAuthController extends Controller
{
    public function index()
    {
        return view('basecore::form-auth');
    }
}
