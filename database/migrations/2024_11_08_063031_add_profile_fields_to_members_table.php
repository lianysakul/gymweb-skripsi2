<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'birth_place')) {
                $table->string('birth_place')->nullable();
            }
            if (!Schema::hasColumn('members', 'birth_date')) {
                $table->date('birth_date')->nullable();
            }
            if (!Schema::hasColumn('members', 'profile_picture')) {
                $table->string('profile_picture')->nullable();
            }
            if (!Schema::hasColumn('members', 'address')) {
                $table->string('address')->nullable();
            }
            if (!Schema::hasColumn('members', 'join_date')) {
                $table->date('join_date')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            if (Schema::hasColumn('members', 'birth_place')) {
                $table->dropColumn('birth_place');
            }
            if (Schema::hasColumn('members', 'birth_date')) {
                $table->dropColumn('birth_date');
            }
            if (Schema::hasColumn('members', 'profile_picture')) {
                $table->dropColumn('profile_picture');
            }
            if (Schema::hasColumn('members', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('members', 'join_date')) {
                $table->dropColumn('join_date');
            }
        });
    }
};
