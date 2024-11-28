<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('membership_type', 'membership_plan');
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('membership_plan', 'membership_type');
        });
    }
};
