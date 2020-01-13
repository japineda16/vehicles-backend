<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                'type' => 'Central'
            ],
            [
                'type' => 'Sucursal'
            ]
        ];
        DB::table('user_type')->insert($type);
    }
}
