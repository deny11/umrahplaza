<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!(Schema::hasTable('users'))) {
			Schema::create('users', function (Blueprint $table) {
				$table->increments('id');
				$table->string('username')->unique();
				$table->string('email')->unique();
				$table->string('name');
				$table->string('password');
				$table->string('phone');
				$table->string('address');
				$table->rememberToken();
				$table->boolean('is_accepted')->default(true);
				$table->boolean('is_verified')->default(false);
				$table->string('verification_code')->unique()->nullable();
				$table->string('password_recovery_code')->unique()->nullable();
				$table->integer('role_id')->unsigned();
				$table->foreign('role_id')->references('id')->on('roles');
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
