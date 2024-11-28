<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('membership_plan')->default('basic')->change(); // Ganti default sesuai kebutuhan Anda
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('membership_plan')->change();
        });
    }
};
