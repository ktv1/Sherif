<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->nullable()->comment('User ID');
            $table->integer('pid')->nullable()->comment('Product ID');
            $table->integer('manager')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('review')->nullable(false);
            $table->text('response')->nullable();
            $table->boolean('sent')->default(false)->comment('Response was sent to reviewer');
            $table->enum('status',['new', 'approved', 'blocked'])->default('new');
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
        Schema::dropIfExists('product_reviews');
    }
}
