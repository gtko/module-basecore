<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Interfaces\RepositoryFetchable;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface  RoleRepositoryContract extends RepositoryFetchable, SearchableRepository, CreateOrUpdateRepositoryContract
{

}
