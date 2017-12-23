<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesTableSeeder::class);

        factory(\App\User::class,10)->create();

        $this->call(UsersTableSeeder::class);
    }
}
