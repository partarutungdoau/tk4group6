<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('products');
            $table->bigInteger('categories');
            $table->bigInteger('suppliers');
            $table->bigInteger('quantity');
            $table->bigInteger('buy_price');
            $table->bigInteger('total_price');
            $table->enum('status',['PENDING', 'SUCCESS','CANCEL']);
            $table->date('order_date');
            $table->date('receive_date')->nullable();
            $table->dateTime('on_delete')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
