<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('orders'))) {
			Schema::create('orders', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('number_double');
				$table->integer('number_triple');
				$table->integer('number_quadruple');
				$table->string('contact_name');
				$table->string('contact_address');
				$table->string('contact_email');
				$table->string('contact_phone');
				$table->integer('status');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->integer('package_id')->unsigned();
				$table->foreign('package_id')->references('id')->on('packages');
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
