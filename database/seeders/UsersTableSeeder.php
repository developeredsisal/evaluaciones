<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Administrador',
                'username'       => 'adminedisal',
                'email'          => 'dev@editorialedisal.com',
                'password'       => bcrypt('gee/182#SU'),
                'remember_token' => null,
                'locale'         => 'Editorial Edisal',
            ],
        ];

        User::insert($users);
    }
}
