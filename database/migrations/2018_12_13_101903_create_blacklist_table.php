<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlacklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklist', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('phone')->unique()->nullable();
            $table->string('ip')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('fullname')->nullable();
            $table->string('city')->nullable();
            $table->string('buyed_at')->nullable();
            $table->string('order_num')->nullable();
            $table->string('comment')->nullable();
            $table->tinyInteger('author');
            $table->boolean('blocked')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blacklist');
    }
}
