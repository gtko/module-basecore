<?php

namespace Modules\BaseCore\Actions\Url;

class SignePayloadUrl
{
    public function generateSign($endpoint, $payload = [], $secret = null){
        if(!$secret){
            $secret = config('app.key');
        }

        return  sha1($endpoint . $secret . json_encode($payload));
    }

    public function signUrl($url, $payload = [], $secret = null){
        $sign = $this->generateSign($url, $payload, $secret);
        return $url . '?sign=' . $sign;
    }

}
