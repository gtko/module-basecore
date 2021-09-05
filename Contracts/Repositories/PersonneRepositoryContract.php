<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Personne;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface PersonneRepositoryContract extends SearchableRepository
{
    public function createPersonne(string $firstname, string $phoneNumber, String $email, String $address_name, String $city, String $code_zip, int $country_id, string $lastname = null, string $date_birth = null, string $gender = 'male', ):?Personne;
    public function updatePersonne(Personne $personne, String $firstname,string $phoneNumber, String $email, String $address_name, String $city, String $code_zip, int $country_id, String $lastname = null, String $dateBirth = null, String $gender = 'male'):?Personne;
    public function updatePersonneAddress(Personne $personne,String $address_name, String $city, String $code_zip, int $country_id):void;
    public function updatePersonnePhone(Personne $personne, String $phoneNumber):void;
    public function updatePersonneEmail(Personne $personne, String $email):void;

}
