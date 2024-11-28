<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingProductPricesTable extends Migration
{
    public function up()
    {
        Schema::create('trainingproduct_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainingproduct_id');
            $table->string('facility_option');
            $table->integer('price'); // Harga dalam Rupiah tanpa desimal
            $table->timestamps();

            $table->foreign('trainingproduct_id')->references('id')->on('trainingproducts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainingproduct_prices');
    }
}

