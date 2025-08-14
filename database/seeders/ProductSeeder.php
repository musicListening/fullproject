<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name'=>'1.5L Sparkling Water','price'=>150,'stock_status'=>'in-stock','image'=>'1.5LSparkling Water.webp'],
            ['name'=>'1L Purified Water','price'=>170,'stock_status'=>'out-stock','image'=>'1LPurified Water.webp'],
            ['name'=>'5L Mineral Water','price'=>160,'stock_status'=>'in-stock','image'=>'5LMineral Water.webp'],
            ['name'=>'10L Spring Water','price'=>140,'stock_status'=>'in-stock','image'=>'10LSpring Water.webp'],
            ['name'=>'20L Bulk Water','price'=>180,'stock_status'=>'out-stock','image'=>'20LBulk Water.webp'],
            ['name'=>'500ml Spring Water','price'=>155,'stock_status'=>'in-stock','image'=>'500mlSpring Water.webp'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}

