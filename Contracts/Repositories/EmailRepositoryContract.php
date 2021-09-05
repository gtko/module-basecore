<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Email;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface EmailRepositoryContract extends SearchableRepository
{
    public function createEmail(String $email):?Email;

}
