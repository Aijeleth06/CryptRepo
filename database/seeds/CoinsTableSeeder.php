<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'name' => 'EzerCoin',
            'price' => 0.019,
            'volume' => 292629000	,
            'circulatingsupply' => 39245304677,
            'maxsupply' => 100000000000,
        ]);
    }
}
