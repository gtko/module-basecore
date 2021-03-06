<?php

namespace Modules\BaseCore\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Modules\BaseCore\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class Country
 * @property int $id
 * @property string $name
 * @property string $iso
 * @property Collection $addresses
 * @package Modules\BaseCore\Models
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Country extends Model
{
    use HasFactory;
//    use QueryCacheable;
//    use Cachable;

//    protected $cacheFor = 3600;

    protected $fillable = ['name', 'iso'];

    protected array $searchableFields = ['*'];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
