<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacilityOptionAndPriceToTrainingProductPricesTable extends Migration
{
    public function up()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->string('facility_option')->after('trainingproduct_id');
            $table->integer('price')->after('facility_option'); // Harga dalam Rupiah tanpa desimal
        });
    }

    public function down()
    {
        Schema::table('trainingproduct_prices', function (Blueprint $table) {
            $table->dropColumn('facility_option');
            $table->dropColumn('price');
        });
    }
}

