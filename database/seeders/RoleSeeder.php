<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            ['name' => 'super-admin'],
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'client'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        $permissions = [
            ['permission' => 'user-edit', 'roles' => ['admin', 'staff']],
            ['permission' => 'user-delete', 'roles' => ['admin']],
            ['permission' => 'user-view', 'roles' => ['admin', 'staff']],
        ];

        foreach ($permissions as $permission) {

            $perm = $permission['permission'];
            $roles = $permission['roles'];

            Permission::create(
                ['name' => $perm,
                ]
            );

            foreach ($roles as $role) {
                if (Role::findByName($role) == null) {
                    Role::create($role);
                }
                $role = Role::findByName($role);
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
                $role->givePermissionTo($perm);

            }

        }
        //        dump(
        //
        //            Role::findByName('admin')->permissions->pluck('name')
        //        );

    }
}
