<?php

namespace Modules\BaseCore\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list emails']);
        Permission::create(['name' => 'views emails']);
        Permission::create(['name' => 'create emails']);
        Permission::create(['name' => 'update emails']);
        Permission::create(['name' => 'delete emails']);

        Permission::create(['name' => 'list phones']);
        Permission::create(['name' => 'views phones']);
        Permission::create(['name' => 'create phones']);
        Permission::create(['name' => 'update phones']);
        Permission::create(['name' => 'delete phones']);

        Permission::create(['name' => 'list countries']);
        Permission::create(['name' => 'views countries']);
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'update countries']);
        Permission::create(['name' => 'delete countries']);

        Permission::create(['name' => 'list personnes']);
        Permission::create(['name' => 'views personnes']);
        Permission::create(['name' => 'create personnes']);
        Permission::create(['name' => 'update personnes']);
        Permission::create(['name' => 'delete personnes']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'views roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'views permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'views users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);
        $user = app(UserEntity::class)::whereHas('personne', function($query) {
            $query->whereHas('emails', function($query) {
                $query->where('email','admin@admin.com');
            });
        })->first();

        if ($user) {
            $user->assignRole($adminRole);
        }


    }
}
