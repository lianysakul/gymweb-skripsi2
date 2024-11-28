<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProductsellsTable extends Migration
{
    public function up()
    {
        Schema::table('productsells', function (Blueprint $table) {
            // Tambahkan kolom user_id
            $table->unsignedBigInteger('user_id')->after('member_id');

            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('productsells', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Hapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
}

