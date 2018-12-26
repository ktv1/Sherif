<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'product_reviews';

    /**
     * Run the migrations.
     * @table product_reviews
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('review_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->date('time');
            $table->text('review');
            $table->integer('mark');
            $table->tinyInteger('publish');
            $table->string('ip', 20);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
