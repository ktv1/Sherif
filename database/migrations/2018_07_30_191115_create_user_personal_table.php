<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPersonalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_personal', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('sex', 10)->nullable();
			$table->date('datebirth')->nullable();
			$table->string('obl', 50)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('street')->nullable();
			$table->string('house', 50)->nullable();
			$table->string('apartment', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_personal');
	}

}
