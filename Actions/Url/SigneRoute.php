<?php

namespace Modules\BaseCore\Actions\Url;

class SigneRoute
{
    public function signer($routeName, $params){
        if(!is_array($params)) $params = [$params];
        $url =  route($routeName, $params);
        $params['sig'] = (new SigneRouteGenerateKey())->generate($url);
        return route($routeName, $params);
    }
}
