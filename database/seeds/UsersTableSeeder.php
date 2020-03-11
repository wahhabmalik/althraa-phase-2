<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array([
            [
                "name" => "Admin",
                "email" => "admin@althraa.com",
                "password" => bcrypt('qwerty123'),
                "gender" => 'Male',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "name" => "Moderator",
                "email" => "moderator@althraa.com",
                "password" => bcrypt('qwerty123'),
                "gender" => 'Male',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],[
                "name" => "User",
                "email" => 'user@althraa.com',
                "password" => bcrypt('qwerty123'),
                "gender" => 'Male',
                "created_at" => date('Y-m-d'),
                "updated_at" => date('Y-m-d'),
            ],
        ]);

        foreach ($users as $user)
            DB::table('users')->insert($user);


        // assigning roles to respective users
        for ($i=1; $i <= 3; $i++) { 
            DB::table('model_has_roles')->insert([
                'role_id' => $i,
                'model_type' => 'App\User',
                'model_id' => $i
            ]);
        }
        
    }
}
