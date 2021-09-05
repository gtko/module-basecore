<?php


namespace Modules\BaseCore\Models\Scopes;

use Modules\BaseCore\Contracts\Services\AvatarContract;


/**
 * Trait HasRef
 * @property string $avatar_url
 * @package Modules\BaseCore\Models\Scopes
 */
trait HasAvatar
{
    public function getAvatarUrlAttribute()
    {
        if($this->profile_photo_url ?? false){
            return $this->profile_photo_url;
        }

        $avatar = app(AvatarContract::class);
        return $avatar->getAvatarUrl($this->initial);
    }
}
