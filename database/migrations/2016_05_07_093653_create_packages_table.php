<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('packages'))) {
			Schema::create('packages', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->date('schedule');
				$table->double('price_double', 20,5);
				$table->double('price_triple', 20,5);
				$table->double('price_quadruple', 20,5);
				$table->boolean('is_discount_in_percentage')->default(true);
				$table->double('discount', 20,5);
				$table->integer('payment_time_range')->default(0);
				$table->longText('description')->nullable();
				$table->longText('pas_foto_desc')->nullable();
				$table->longText('ktp_desc')->nullable();
				$table->longText('ktp_kk_asli_desc')->nullable();
				$table->longText('surat_nikah_kk_asli_desc')->nullable();
				$table->longText('uang_muka_desc')->nullable();
				$table->longText('pelunasan_desc')->nullable();
				$table->longText('pendaftaran_desc')->nullable();
				$table->longText('kartu_kuning_desc')->nullable();
				$table->integer('stock');
				$table->integer('time_viewed');
				$table->integer('route_id')->unsigned();
				$table->foreign('route_id')->references('id')->on('routes');
				$table->integer('airline_id')->unsigned();
				$table->foreign('airline_id')->references('id')->on('airlines');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->integer('hotel_mekkah_id')->unsigned();
				$table->foreign('hotel_mekkah_id')->references('id')->on('hotels');
				$table->integer('hotel_madinah_id')->unsigned();
				$table->foreign('hotel_madinah_id')->references('id')->on('hotels');
				$table->integer('currency_id')->unsigned();
				$table->foreign('currency_id')->references('id')->on('currencies');
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
