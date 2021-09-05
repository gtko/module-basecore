<?php

namespace Modules\BaseCore\Models;

use Modules\BaseCore\Database\Factories\AddressFactory;
use Modules\BaseCore\Database\Factories\PhoneFactory;
use Modules\BaseCore\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Address
 * @property int $id
 * @property Address $address
 * @property string $city
 * @property int $country_id
 * @property string $code_zip
 * @property Country $country
 * @property Personne $personne
 * @package Modules\BaseCore\Models
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'city', 'country_id', 'code_zip'];

    protected array $searchableFields = ['*'];

    public function personne(): HasOne
    {
        return $this->hasOne(Personne::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AddressFactory::new();
    }
}
