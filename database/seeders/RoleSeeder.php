<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            ['permission' => 'user-delete', 'roles' => ['admin', 'staff']],
            ['permission' => 'user-view', 'roles' => ['admin', 'staff']],
        ];

        foreach ($permissions as $permission) {
            //            $newperm = Permission::create($permission);
            //            $newperm->roles
            $newperm = ['name' => $permission['permission']];
            $permission = Permission::create($newperm);
            $permission->syncRoles($permission['roles']);
        }

    }
}
