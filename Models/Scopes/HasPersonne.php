<?php


namespace Modules\BaseCore\Models\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;

/**
 * Trait HasPersonne
 * @property string $format_name
 * @property string $format_phone
 * @property Email $email_model
 * @property string $email
 * @property string $phone
 * @property Carbon $date_birth
 * @property Personne $personne
 * @property string $gender
 * @property string $address
 * @property string $city
 * @property string $code_zip
 * @property string $country
 * @property string $full_address
 * @property string $firstname
 * @property string $lastname
 * @property bool $has_name
 * @property string $initial
 * @property string $avatar_url
 * @package Modules\BaseCore\Models\Scopes
 */
trait HasPersonne
{

    use HasAvatar;

    public function newQuery(): Builder
    {
        return parent::newQuery()->with(['personne.address.country', 'personne.phones', 'personne.emails']);
    }

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function getEmailModelAttribute()
    {
        if ($this->personne->emails->count() > 0) {
            return $this->personne->emails->first();
        }

        return null;
    }

    public function getEmailAttribute()
    {
        if ($this->personne->emails->count() > 0) {
            return $this->personne->emails->first()->email;
        }

        return null;
    }

    public function getPhoneAttribute()
    {
        if ($this->personne->phones->count() > 0) {
            return $this->personne->phones->first()->phone;
        }

        return null;
    }

    public function getDateBirthAttribute()
    {
         return $this->personne->date_birth ?? '';
    }

    public function getGenderAttribute()
    {
        return $this->personne->gender ?? '';
    }

    public function getAddressAttribute()
    {
            return $this->personne->address->address ?? '';
    }

    public function getCityAttribute()
    {
            return $this->personne->address->city ?? '';
    }

    public function getCodeZipAttribute()
    {
            return $this->personne->address->code_zip ?? '';
    }

    public function getCountryAttribute()
    {
            return $this->personne->address->country->name ?? '';
    }

    public function getFullAddressAttribute()
    {
        $address = $this->personne->address->address ?? '';
        $code_zip = $this->personne->address->code_zip ?? '';
        $city = $this->personne->address->city ?? '';
        $country = $this->personne->address->country->name ?? '';

        return  $address . ', ' . $code_zip . ' ' . $city . ', ' . $country;
    }

    public function getFirstNameAttribute()
    {
        return $this->personne->firstname ?? '';
    }

    public function getLastNameAttribute()
    {
        return $this->personne->lastname ?? '';
    }

    public function getFormatNameAttribute()
    {
        return trim(\Illuminate\Support\Str::ucfirst($this->firstname) . ' ' . \Illuminate\Support\Str::upper($this->lastname));
    }

    public function getFormatPhoneAttribute()
    {


            $phone = str_replace('+33 ', '0', $this->phone);


        return $phone;
    }

    public function getHasNameAttribute()
    {
        return ($this->firstname || $this->lastname);
    }

    public function getInitialAttribute()
    {
        $letter = '';
        if ($this->firstname) {
            $letter .= $this->firstname[0];
        }
        if ($this->lastname) {
            $letter .= $this->lastname[0];
        }
        return \Illuminate\Support\Str::upper($letter);
    }
}
