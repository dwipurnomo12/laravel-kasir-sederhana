<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Admin',
                'username'  => 'admin',
                'password'  => bcrypt('12345678'),
                'level'     => 1,
                'email'     => 'admin@gmail.com'
            ],
            [
                'name'      => 'Kasir',
                'username'  => 'kasir',
                'password'  => bcrypt('12345678'),
                'level'     => 2,
                'email'     => 'kasir@gmail.com'
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
