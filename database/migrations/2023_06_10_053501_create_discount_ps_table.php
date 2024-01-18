<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_ps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('discount');
            $table->timestamps();

            $table->foreign('discount')->references('id')->on('discounts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_ps');
    }
}
