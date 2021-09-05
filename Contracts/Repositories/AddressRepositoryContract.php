<?php


namespace Modules\BaseCore\Contracts\Repositories;


use Modules\BaseCore\Models\Address;

interface AddressRepositoryContract
{
    public function createAddress(String $address_name, String $city, String $code_zip, String $country_id):?Address;
    public function updateAddress(int $addressId, String $address_name, String $city, String $code_zip, String $country_id):?Address;

}
