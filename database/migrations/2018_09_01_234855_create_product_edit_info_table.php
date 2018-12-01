<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductEditInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_edit_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->nullable();
			$table->string('publication_user')->nullable();
			$table->dateTime('publication_updated_at')->nullable();
			$table->string('editing_user')->nullable();
			$table->dateTime('editing_updated_at')->nullable();
			$table->string('publication_action')->nullable();
			$table->string('description_user')->nullable();
			$table->dateTime('description_updated_at')->nullable();
			$table->string('status')->nullable();
			$table->dateTime('status_updated_at')->nullable();
			$table->string('status_user')->nullable();
			$table->dateTime('status_to_change')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_edit_info');
	}

}
