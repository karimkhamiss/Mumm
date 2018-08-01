<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Role::create([
            'name' => "Admin",
            'description'=> "Post Articles",
            'permissions' => json_encode([
                'admins',
                'followers',
                'articles',
                'categories',
                'settings'
            ])
        ]);
        \App\Model\Role::create([
            'name' => "Follower",
            'description'=> "Read Articles and comment",
            'permissions' => json_encode([
                'articles',
                'settings'
            ])
        ]);

    }
}
