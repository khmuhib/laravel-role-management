<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'super admin']);
        $permissions = [
            [
                'name' => 'user list',
            ],
            [
                'name' => 'user create',
            ],
            [
                'name' => 'user edit',
            ],
            [
                'name' => 'user delete',
            ],
            [
                'name' => 'role list',
            ],
            [
                'name' => 'role create',
            ],
            [
                'name' => 'role edit',
            ],
            [
                'name' => 'role delete',
            ]
        ];
        foreach ($permissions as $item) {
            Permission::create($item);
        }
        $role->syncPermissions(Permission::all());
        $user = User::first();
        $user->assignRole($role);
    }
}
