<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->string('author');
            $table->string('language');
            $table->integer('total_page');
            $table->float('price')->nullable();
            $table->boolean('status')->default(0);
            $table->string('image');
            $table->string('pdf');
            $table->text('published_date');
            $table->text('description')->nullable();
            $table->boolean('free')->default(0);
            $table->boolean('upcoming')->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
