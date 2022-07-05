<?php


namespace Modules\BaseCore\Contracts\Repositories;


use Modules\BaseCore\Models\Address;

interface AddressRepositoryContract extends RelationsRepositoryContract, CreateOrUpdateRepositoryContract
{
    public function create(String $address_name,  $city ='',  $code_zip ='',  $country_id='150'):?Address;
    public function update(Address $address,  $address_name,  $city='',  $code_zip='',  $country_id='150'):?Address;

}
