<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('newscategory_id');
            $table->date('date');
            $table->string('image');
            $table->boolean('status')->default(0);
            $table->boolean('hotnews')->default(0);
            $table->boolean('breaking')->default(0);
            $table->text('description');
            $table->foreign('newscategory_id')->references('id')->on('newscategories')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
