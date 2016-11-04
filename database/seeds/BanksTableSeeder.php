<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('banks')->insert([
			['name' => 'Bank Mandiri'],
			['name' => 'Bank Negara Indonesia'],
			['name' => 'Bank Rakyat Indonesia'],
			['name' => 'Bank Tabungan Negara'],
			['name' => 'Bank Central Asia'],
			['name' => 'Bank Bukopin'],
			['name' => 'Bank CIMB Niaga'],
			['name' => 'Bank Permata'],
			['name' => 'Bank Mega']
		]);
	}
}
