<?php


namespace Modules\BaseCore\Contracts\Repositories;

use Modules\BaseCore\Models\Phone;
use Modules\SearchCRM\Interfaces\SearchableRepository;

interface PhoneRepositoryContract extends SearchableRepository
{
    public function create(String $number):Phone;
    public function update(Phone $phone, String $number):Phone;

}
