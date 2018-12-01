<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->timestamps();
			$table->text('description', 65535)->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('depth')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_decsription')->nullable();
			$table->string('image')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles_categories');
	}

}
