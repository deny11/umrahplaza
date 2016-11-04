<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('notifications'))) {
			Schema::create('notifications', function (Blueprint $table) {
				$table->increments('id');
				$table->boolean('is_viewed');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->integer('payment_confirmation_id')->unsigned();
				$table->foreign('payment_confirmation_id')->references('id')->on('payment_confirmations');
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
