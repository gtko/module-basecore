<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Personne;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface PersonneRepositoryContract extends SearchableRepository, RelationsRepositoryContract
{
    public function create(string $firstname, string $lastname = null, string $date_birth = null, string $gender = 'male', ):?Personne;
    public function update(Personne $personne, string $firstname, string $lastname = null, String $dateBirth = null, String $gender = 'male'):?Personne;
    public function createForRegister(string $lastname, string $gender = 'male'): Personne;


}
