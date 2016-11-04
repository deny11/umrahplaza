<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePackageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		if (!(Schema::hasTable('image_package'))) {
//			Schema::create('image_package', function (Blueprint $table) {
//				$table->integer('image_id')->unsigned();
//				$table->foreign('image_id')->references('id')->on('images');
//				$table->integer('package_id')->unsigned();
//				$table->foreign('package_id')->references('id')->on('packages');
//				$table->timestamps();
//				$table->softDeletes();
//			});
//		}
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
