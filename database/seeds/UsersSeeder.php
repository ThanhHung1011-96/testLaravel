<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $data = [
            [
                'name' => "Admin 1",
                'email' => 'admin1@gmail.com',
                'password' => bcrypt(123456),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Admin 2",
                'email' => 'admin2@gmail.com',
                'password' => bcrypt(123456),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Admin 3",
                'email' => 'admin3@gmail.com',
                'password' => bcrypt(123456),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        $user->insert($data);
    }
}