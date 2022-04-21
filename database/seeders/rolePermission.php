<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperadmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        //Permission List as Array
        $permissions =[

            //Dashboard Permission
            "dashboard.view",

            //Blog Permission
            "blog.view",
            "blog.create",
            "blog.edit",
            "blog.delete",
            "blog.approve",

            //Admin Permission

            "admin.view",
            "admin.create",
            "admin.edit",
            "admin.delete",
            "admin.approve",

           //Role Permission
            "role.view",
            "role.create",
            "role.edit",
            "role.delete",
            "role.approve",

            //Profile Permission
            "profile.view",
            "profile.edit",

        ];

        //Create and Assign Permission

        for ($i=0; $i < count( $permissions); $i++) {
            //create permission
            $permission = Permission::create(['name' =>$permissions[$i]]);
            $roleSuperadmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperadmin);
        }
    }
}
