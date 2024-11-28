<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToTrainingProductPricesTable extends Migration
{
    public function up()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->integer('price')->after('facility_option'); // Harga dalam Rupiah tanpa desimal
        });
    }

    public function down()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}

