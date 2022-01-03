<?php

namespace Modules\BaseCore\Actions\Url;

class SigneRouteGenerateKey
{
    public function generate($url){
        return  md5($url . config('app.key'));
    }
}
