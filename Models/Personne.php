<?php

namespace Modules\BaseCore\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Database\Factories\PersonneFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Rennokki\QueryCache\Traits\QueryCacheable;
/**
 * Class Personne
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int $address_id
 * @property Carbon $date_birth
 * @property string $gender
 * @property Collection $emails
 * @property Address $address
 * @property Collection $phones
 * @property UserEntity $user
 * @property string $company
 * @property string $type
 * @package Modules\BaseCore\Models
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Personne extends Model
{
    use HasFactory;
//    use QueryCacheable;
//
//    /**
//     * Invalidate the cache automatically
//     * upon update in the database.
//     *
//     * @var bool
//     */
//    protected static $flushCacheOnUpdate = true;

    protected $fillable = [
        'address_id',
        'firstname',
        'lastname',
        'date_birth',
        'gender',
    ];


    protected $casts = [
        'date_birth' => 'datetime',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(app(UserEntity::class)::class);
    }

    public function emails(): BelongsToMany
    {
        return $this->belongsToMany(Email::class)->withPivot('order')->orderBy('order', 'asc');
    }

    public function phones(): BelongsToMany
    {
        return $this->belongsToMany(Phone::class)->withPivot('order')->orderBy('order', 'asc');
    }


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PersonneFactory::new();
    }
}
