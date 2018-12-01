<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerLinkPositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_link_position', function(Blueprint $table)
		{
            $table->increments('id');
		    $table->integer('banner_image_id');
			$table->integer('banner_id');
			$table->integer('banner_position_id');
			$table->string('link')->nullable();
			$table->string('position', 6)->nullable();
			//$table->primary(['banner_position_id','banner_image_id','banner_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_link_position');
	}

}
