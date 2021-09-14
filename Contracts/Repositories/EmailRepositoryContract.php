<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Email;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface EmailRepositoryContract extends SearchableRepository, RelationsRepositoryContract, CreateOrUpdateRepositoryContract
{
    public function create(String $email):Email;
    public function update(Email $emailModel, String $email):Email;
    public function fetchByEmail(string $email): Email;

}
