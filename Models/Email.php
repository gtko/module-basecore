<?php

namespace Modules\BaseCore\Models;

use Modules\BaseCore\Database\Factories\EmailFactory;
use Modules\BaseCore\Database\Factories\PhoneFactory;
use Modules\BaseCore\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Rennokki\QueryCache\Traits\QueryCacheable;
/**
 * Class Email
 * @property int $id
 * @property string $email
 * @property Collection $personnes
 * @package Modules\BaseCore\Models
 * @mixin Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Email extends Model
{
    use HasFactory;
    use QueryCacheable;


    protected $fillable = ['email'];

    protected array $searchableFields = ['*'];

    public function personnes():BelongsToMany
    {
        return $this->belongsToMany(Personne::class)->withPivot('order');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return EmailFactory::new();
    }
}
