<?php namespace Modules\BaseCore\Repositories;


use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Models\Address;

class AddressRepository implements AddressRepositoryContract
{
    public function createAddress(String $address_name, String $city, String $code_zip, String $country_id):?Address
    {
        $address = new Address();

        $address->address = $address_name;
        $address->city = $city;
        $address->code_zip = $code_zip;
        $address->country_id = $country_id;
        $address->save();

        return $address;
    }

    public function updateAddress(int $addressId, String $address_name, String $city, String $code_zip, String $country_id):?Address
    {
        $address = Address::find($addressId);
        $address->address = $address_name;
        $address->city = $city;
        $address->code_zip = $code_zip;
        $address->country_id = $country_id;
        $address->save();

        return $address;
    }
}
