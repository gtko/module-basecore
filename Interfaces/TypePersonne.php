<?php


namespace Modules\BaseCore\Interfaces;

use Modules\BaseCore\Models\Personne;

/**
 * Interface TypePersonne
 * @property Personne $personne
 * @property $firstname
 * @property $lastname
 * @property $date_birth
 * @property $gender
 * @property $email
 * @property $address
 * @property $city
 * @property $code_zip
 * @property $country_id
 * @property $phone
 * @property $avatar_url
 * @package Modules\BaseCore\Models\Interfaces
 */
interface TypePersonne
{

    public function personne();
    public function getEmailModelAttribute();
    public function getEmailAttribute();
    public function getPhoneAttribute();
    public function getDateBirthAttribute();
    public function getGenderAttribute();
    public function getAddressAttribute();
    public function getCityAttribute();
    public function getCodeZipAttribute();
    public function getCountryAttribute();
    public function getFullAddressAttribute();
    public function getFirstNameAttribute();
    public function getLastNameAttribute();
    public function getFormatNameAttribute();
    public function getHasNameAttribute();
    public function getInitialAttribute();
    public function getAvatarUrlAttribute();

}
