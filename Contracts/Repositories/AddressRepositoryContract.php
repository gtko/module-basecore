<?php


namespace Modules\BaseCore\Contracts\Repositories;


use Modules\BaseCore\Models\Address;

interface AddressRepositoryContract
{
    public function create(String $address_name, String $city, String $code_zip, String $country_id):?Address;
    public function update(Address $address, String $address_name, String $city, String $code_zip, String $country_id):?Address;

}
