<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vendors';

    /**
     * Run the migrations.
     * @table vendors
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->string('youtube')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_desription')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->integer('status')->nullable()->default(null);
            $table->integer('count_products')->nullable()->default('12');
            $table->string('image')->nullable()->default(null);
            $table->integer('order')->nullable()->default(null);
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
