<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no')->nullable();
            $table->integer('ref_id')->nullable();
            $table->string('hub')->nullable();
            $table->integer('net_price')->nullable();
            $table->integer('vat_price')->nullable();
            $table->integer('e_d_charge')->nullable();
            $table->integer('service_charge')->nullable();
            $table->integer('gross_total')->nullable();
            $table->integer('delivery_charge')->nullable();
            $table->integer('taxable_amount')->nullable();
            $table->string('status');
            $table->integer('amount')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('billings');
    }
}
