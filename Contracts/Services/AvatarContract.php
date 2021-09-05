<?php


namespace Modules\BaseCore\Contracts\Services;


interface AvatarContract
{
    public function getAvatarUrl(string $initial):string;
}
