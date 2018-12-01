<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('slug', 191)->unique();
			$table->timestamps();
			$table->integer('sale_discount')->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('depth')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_description')->nullable();
			$table->string('image')->nullable();
			$table->integer('in_stock')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
