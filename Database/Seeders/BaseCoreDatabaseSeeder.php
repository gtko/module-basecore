<?php

namespace Modules\BaseCore\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\BaseCore\Database\Factories\UserFactory;
use Modules\BaseCore\Models\Email;
use Modules\BaseCore\Models\Personne;
use Modules\BaseCore\Models\Phone;
use Modules\BaseCore\Models\User;
use Modules\BaseCore\Database\Seeders\WorldCountriesTableSeeder;

class BaseCoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(WorldCountriesTableSeeder::class);

        $user = UserFactory::new()->create([
                'personne_id' => Personne::factory()
                    ->hasAttached(Phone::factory()->create())
                    ->hasAttached(Email::factory()->create(['email' => 'crobs@gmail.com'])),
                'password' => \Hash::make('crypto!123456'),
            ]);

        $this->call(PermissionsSeeder::class);

    }
}
