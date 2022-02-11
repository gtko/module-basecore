<?php

namespace Modules\BaseCore\Services;

class DarkModeService
{

    protected $darkMode = false;

    public function __construct(){
        $this->darkMode = session()->has('dark_mode') ? filter_var(session('dark_mode'), FILTER_VALIDATE_BOOLEAN) : false;
    }

    public function isDarkMode(){
        return $this->darkMode;
    }

}
