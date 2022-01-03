<?php

namespace Modules\BaseCore\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Database\Factories\UserFactory;
use Modules\BaseCore\Interfaces\TypePersonne;
use Modules\BaseCore\Models\Scopes\HasPersonne;
use Modules\BaseCore\Models\Scopes\HasProfilePhoto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Modules\SearchCRM\Entities\SearchResult;
use Modules\SearchCRM\Interfaces\SearchableModel;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package Modules\BaseCore\Models
 * @property int $id
 * @property array $data
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class User extends UserEntity
{

    protected $fillable = ['password', 'personne_id', 'email', 'data'];


    protected $casts = ['data' => 'array'];

    protected static function newFactory():Factory
    {
        return UserFactory::new();
    }

    public function personne():BelongsTo
    {
        return $this->belongsTo(Personne::class);
    }

    public function isSuperAdmin():bool
    {
        return $this->hasRole('super-admin');
    }

    public function getSearchResult(): SearchResult
    {
        $tag = 'utilisateurs';
        if($this->isSuperAdmin()) $tag = 'admins';

        $result = new SearchResult(
            $this,
            $this->format_name,
            route('users.show', $this->id),
            $tag,
            html:"<small>{$this->email}</small> - <small>{$this->phone}</small>"
        );
        $result->setImg($this->avatar_url);
        return $result;
    }


    public function getCompanyAttribute(){
        return $this->data['company'] ?? null;
    }

    public function getSiretAttribute(){
        return $this->data['siret'] ?? null;
    }


}
