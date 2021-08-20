<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'id' => null,
            'name'=>'Акции шоколадной фабрики',
            'volatility'=>'1',
            'start_price' =>20000
        ]);
        DB::table('stocks')->insert([
            'id' => null,
            'name'=>'Акции мармеладной фабрики',
            'volatility'=>'2',
            'start_price'=>5000
        ]);
        DB::table('stocks')->insert([
            'id' => null,
            'name'=>'Акции весёлой фермы',
            'volatility'=>'9',
        ]);
        DB::table('stocks')->insert([
            'id' => null,
            'name'=>'Брусничные акции',
            'volatility'=>'5',
        ]);
    }
}
