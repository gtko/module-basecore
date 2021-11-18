<?php

namespace Modules\BaseCore\Database\Seeders;


use DB;
use Illuminate\Database\Seeder;
use Modules\BaseCore\Database\Seeders\CountriesDatas;
use Modules\BaseCore\Models\Country;

class WorldCountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert((new CountriesDatas())->data());
    }
}
