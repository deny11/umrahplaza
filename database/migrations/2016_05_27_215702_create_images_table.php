<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('images'))) {
            Schema::create('images', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!(Schema::hasTable('image_package'))) {
            Schema::create('image_package', function (Blueprint $table) {
                $table->integer('image_id')->unsigned();
                $table->foreign('image_id')->references('id')->on('images');
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
