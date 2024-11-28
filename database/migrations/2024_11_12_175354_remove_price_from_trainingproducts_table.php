<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePriceFromTrainingProductsTable extends Migration
{
    public function up()
    {
        Schema::table('trainingproducts', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

    public function down()
    {
        Schema::table('trainingproducts', function (Blueprint $table) {
            $table->integer('price')->default(0);
        });
    }
}

