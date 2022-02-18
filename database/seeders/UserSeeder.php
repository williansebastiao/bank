<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'Laura',
                'last_name' => 'Almeida',
                'email' => 'lauracunhaalmeida@jourrapide.com',
                'cpf_cnpj' => '26336386000109',
                'password' => bcrypt('12345678'),
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Willians',
                'last_name' => 'Pereira',
                'email' => 'willians@4vconnect.com',
                'cpf_cnpj' => '76546325411',
                'password' => bcrypt('12345678'),
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ingrid',
                'last_name' => 'Soares',
                'email' => 'ingrid@4vconnect.com',
                'cpf_cnpj' => '70308133080',
                'password' => bcrypt('12345678'),
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
