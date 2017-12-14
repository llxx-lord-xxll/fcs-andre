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
        //
        $u = new \App\users();
        $u->email = "test@futurecitysummit.com";
        $u->password = bcrypt("test1234");
        $u->save();

        $u = \App\User::where('id','=',$u->id)->first();
        $u->assignRole('Super Admin');

        $u = new \App\users();
        $u->email = "test2@futurecitysummit.com";
        $u->password = bcrypt("test1234");
        $u->save();

        $u = \App\User::where('id','=',$u->id)->first();
        $u->assignRole('Admin');
    }
}
