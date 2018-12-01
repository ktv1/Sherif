<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_image', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('banner_id')->nullable();
			$table->text('link', 65535)->nullable();
			$table->string('image')->nullable();
			$table->string('type', 10)->nullable();
			$table->integer('order')->nullable();
			$table->text('description', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_image');
	}

}
