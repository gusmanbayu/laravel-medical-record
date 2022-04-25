<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'level' => '1',
                'password' => bcrypt('123456789'),
            ],
            [
                'name' => 'User',
                'email' => 'user@test.com',
                'level' => '0',
                'password' => bcrypt('123456789'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
