<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemberIdToProductsellsTable extends Migration
{
    public function up()
    {
        Schema::table('productsells', function (Blueprint $table) {
            // Tambahkan kolom member_id jika belum ada
            if (!Schema::hasColumn('productsells', 'member_id')) {
                $table->unsignedBigInteger('member_id')->after('id');
            }

            // Tambahkan foreign key constraint
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('productsells', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign(['member_id']);
            
            // Hapus kolom member_id
            $table->dropColumn('member_id');
        });
    }
}


