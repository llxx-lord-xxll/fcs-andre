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
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage admins']);
        Permission::create(['name' => 'manage superadmins']);
        Permission::create(['name' => 'manage chapterleaders']);
        Permission::create(['name' => 'view web traffic']);
        Permission::create(['name' => 'view chapters']);
        Permission::create(['name' => 'manage chapters']);
        Permission::create(['name' => 'manage pages']);
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'manage info']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'messenger']);


        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo("manage admins");
        $role->givePermissionTo("manage superadmins");
        $role->givePermissionTo("view web traffic");
        $role->givePermissionTo("view chapters");

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo("manage chapterleaders");
        $role->givePermissionTo("manage admins");
        $role->givePermissionTo("manage pages");
        $role->givePermissionTo("messenger");
        $role->givePermissionTo("manage posts");
        $role->givePermissionTo("manage chapters");
        $role->givePermissionTo("update settings");

        $role = Role::create(['name' => 'Chapter Leader']);



    }
}
