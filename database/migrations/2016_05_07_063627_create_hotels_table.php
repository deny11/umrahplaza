<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('hotels'))) {
			Schema::create('hotels', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name')->unique();
				$table->integer('city_code');
				$table->integer('rate');
				$table->longText('location');
				$table->longText('food');
				$table->longText('internet');
				$table->longText('distance');
				$table->longText('parking_area');
				$table->longText('public_facility');
				$table->longText('service');
				$table->timestamps();
				$table->softDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}
