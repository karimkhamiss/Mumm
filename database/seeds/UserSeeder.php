<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Model\User();
        $user->first_name = "Karim";
        $user->last_name = "Khamiss";
        $user->password  = bcrypt("karim");
        $user->username = "karim";
        $user->role_id = 1;
        $user->save();
    }
}
