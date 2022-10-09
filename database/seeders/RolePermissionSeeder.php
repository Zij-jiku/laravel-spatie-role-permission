<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor', 'guard_name' => 'admin']);
        $roleUser = Role::create(['name' => 'user', 'guard_name' => 'admin']);

        // permission list array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'guard_name' => 'admin',
                'permissions' => [
                    // Dashboard Permission
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],

            [
                'group_name' => 'blog',
                'guard_name' => 'admin',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],


            [
                'group_name' => 'admin',
                'guard_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],

            [
                'group_name' => 'role',
                'guard_name' => 'admin',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',

                ]
            ],

            [
                'group_name' => 'profile',
                'guard_name' => 'admin',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissonGroup = $permissions[$i]['group_name'];
            $guardName = $permissions[$i]['guard_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'guard_name' => $guardName, 'group_name' => $permissonGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
