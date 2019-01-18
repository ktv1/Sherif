<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInterestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->nullable();
			$table->string('product_URL')->nullable();
			$table->timestamps();
			$table->string('vendor_code')->nullable();
			$table->string('code')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('social_media')->nullable();
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('interests');
	}

}
