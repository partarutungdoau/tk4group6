<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_ps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction');
            $table->bigInteger('id_product');
            $table->string('product_name');
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->bigInteger('sub_total');
            $table->timestamps();

            $table->foreign('transaction')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_ps');
    }
}
