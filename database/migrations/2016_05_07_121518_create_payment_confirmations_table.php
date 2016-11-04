<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentConfirmationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('payment_confirmations'))) {
			Schema::create('payment_confirmations', function (Blueprint $table) {
				$table->increments('id');
				$table->double('amount_transfered', 20, 5);
				$table->string('account_name');
				$table->integer('currency_id')->unsigned();
				$table->foreign('currency_id')->references('id')->on('currencies');
				$table->integer('bank_id')->unsigned();
				$table->foreign('bank_id')->references('id')->on('banks');
				$table->integer('order_id')->unsigned();
				$table->foreign('order_id')->references('id')->on('orders');
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
