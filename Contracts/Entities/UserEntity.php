<?php

namespace Modules\BaseCore\Contracts\Entities;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Scopes\HasPersonne;
use Modules\BaseCore\Models\Scopes\HasProfilePhoto;
use Modules\SearchCRM\Entities\SearchResult;
use Modules\SearchCRM\Interfaces\SearchableModel;
use Spatie\Permission\Traits\HasRoles;

Abstract class UserEntity extends Authenticatable implements TypePersonne, SearchableModel
{
    use Notifiable;
    use HasRoles;
    use HasFactory;
    use HasApiTokens;
    use HasProfilePhoto;
    use HasPersonne;
    use TwoFactorAuthenticatable;

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    public function getMorphClass():string
    {
        return app(self::class)::class;
    }

    abstract protected static function newFactory():Factory;
    abstract public function personne():BelongsTo;
    abstract public function isSuperAdmin():bool;
    abstract public function getSearchResult(): SearchResult;

}
