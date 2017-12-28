<?php

use Illuminate\Database\Seeder;
use Kodeine\Metable\Metable;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = \App\User::where('id','=',1)->first();
        $u->assignRole('Super Admin');

        $u = \App\User::where('id','=',2)->first();
        $u->assignRole('Admin');

        foreach(\App\User::where('id','>','2')->get() as $user)
        {
            $user->assignRole('Chapter Leader');
        }

    }
}
