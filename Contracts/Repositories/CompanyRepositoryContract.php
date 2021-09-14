<?php

namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Personne;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface CompanyRepositoryContract extends SearchableRepository,RelationsRepositoryContract
{

    public function create(Personne $personne, string $company_name): Personne;
    public function update(Personne $personne, string $company_name): Personne;
}
