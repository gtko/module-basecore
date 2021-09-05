<?php


namespace Modules\BaseCore\Models\Scopes;


use Modules\BaseCore\Contracts\Services\AvatarContract;

trait HasProfilePhoto
{

    use \Laravel\Jetstream\HasProfilePhoto;

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        $avatar = app(AvatarContract::class);
        return $avatar->getAvatarUrl($this->initial);
    }


}
