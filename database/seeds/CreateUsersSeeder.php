<?php

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
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
                'name' => 'Principal',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('empresa'),
                'type' => 1
            ],
            [
                'name' => 'Sucursal1',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('empresa'),
                'type' => 2
            ],
            [
                'name' => 'Sucursal2',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('empresa'),
                'type' => 2
            ],
        ];

        DB::table('users')->insert($users);
    }
}
