<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallet = [
            [
                'value' => 10000.00,
                'wallet_date' => now(),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 1000.00,
                'wallet_date' => now(),
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 500.00,
                'wallet_date' => now(),
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('wallets')->insert($wallet);
    }
}
