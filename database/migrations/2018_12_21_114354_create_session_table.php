<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('session', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('payload', 65535)->nullable();
			$table->string('ip_address', 20)->nullable();
			$table->timestamps();
			$table->string('session_id', 100)->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('id_product')->nullable();
			$table->integer('amount_product')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('session');
	}

}
