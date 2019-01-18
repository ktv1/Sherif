<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('managers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email1')->nullable();
			$table->string('email2')->nullable();
			$table->string('phone1')->nullable();
			$table->string('phone2')->nullable();
			$table->string('phone3')->nullable();
			$table->integer('categories')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('managers');
	}

}
