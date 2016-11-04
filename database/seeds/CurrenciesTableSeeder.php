<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'name' => 'Rupiah',
                'symbol' => 'Rp'
            ],
            [
                'name' => 'US Dollar',
                'year' => '$'
            ]
        ]);
    }
}
