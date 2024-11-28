<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemberStatusInGymAndMemberInGymOnToMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('member_status_in_gym')->nullable();
            $table->timestamp('member_in_gym_on')->nullable();
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('member_status_in_gym');
            $table->dropColumn('member_in_gym_on');
        });
    }
}


