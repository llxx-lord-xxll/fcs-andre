<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'manage admins']);
        $permission = Permission::create(['name' => 'manage superadmins']);
        $permission = Permission::create(['name' => 'manage chapterleaders']);
        $permission = Permission::create(['name' => 'view web traffic']);
        $permission = Permission::create(['name' => 'view chapters']);
        $permission = Permission::create(['name' => 'manage chapters']);
        $permission = Permission::create(['name' => 'manage menues']);
        $permission = Permission::create(['name' => 'manage pages']);
        $permission = Permission::create(['name' => 'manage posts']);
        $permission = Permission::create(['name' => 'manage theme']);
        $permission = Permission::create(['name' => 'manage info']);
        $permission = Permission::create(['name' => 'update settings']);


        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo("manage admins");
        $role->givePermissionTo("manage superadmins");
        $role->givePermissionTo("view web traffic");
        $role->givePermissionTo("view chapters");

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo("manage admins");
        $role->givePermissionTo("manage menues");
        $role->givePermissionTo("manage pages");
        $role->givePermissionTo("manage posts");
        $role->givePermissionTo("manage theme");
        $role->givePermissionTo("manage chapters");



    }
}
