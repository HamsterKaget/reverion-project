<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterPlansSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $usdRate = 16900; // 1 USD = 16.900 IDR
        $markup = 1.05;  // +5%

        $packages = [
            1000,
            2000,
            5000,
            10000,
            25000,
            50000,
            75000,
            100000,
            250000,
            500000,
            1000000,
            2000000,
        ];

        $data = [];

        foreach ($packages as $index => $priceIdr) {
            $priceUsd = round(($priceIdr / $usdRate) * $markup, 2);

            $data[] = [
                'name' => number_format($priceIdr / 1000, 0) . 'K Cash',
                'price_idr' => $priceIdr,
                'discount_price_idr' => null,
                'price_usd' => $priceUsd,
                'price_discount_usd' => null,
                'item' => 'cash',
                'amount' => $priceIdr, // 1 IDR = 1 Cash
                'is_active' => 1,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('master_plans')->insert($data);
    }
}
