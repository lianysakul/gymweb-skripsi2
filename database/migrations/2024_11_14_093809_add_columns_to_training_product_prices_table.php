<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTrainingProductPricesTable extends Migration
{
    public function up()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->unsignedBigInteger('trainingproduct_id')->after('id');
            $table->string('facility_option')->after('trainingproduct_id');
            $table->integer('price')->after('facility_option'); // Harga dalam Rupiah tanpa desimal

            // Definisikan foreign key
            $table->foreign('trainingproduct_id')->references('id')->on('trainingproducts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->dropForeign(['trainingproduct_id']);
            $table->dropColumn(['trainingproduct_id', 'facility_option', 'price']);
        });
    }
}
