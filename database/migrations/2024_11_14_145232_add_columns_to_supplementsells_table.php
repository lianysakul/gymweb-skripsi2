<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSupplementsellsTable extends Migration
{
    public function up()
    {
        Schema::table('supplementsells', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->after('id');
            $table->unsignedBigInteger('user_id')->after('member_id');
            $table->string('supplement_type')->after('user_id');
            $table->unsignedBigInteger('total_amount')->after('supplement_type');
            $table->enum('payment_status', ['on going', 'upcoming due', 'expired'])->after('total_amount');
            $table->enum('payment_method', ['cash', 'e-wallet'])->after('payment_status');
            $table->timestamp('created_on')->useCurrent()->after('payment_method');
            $table->text('description')->nullable()->after('created_on');

            // Definisikan foreign key
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('supplementsells', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['member_id', 'user_id', 'supplement_type', 'total_amount', 'payment_status', 'payment_method', 'created_on', 'description']);
        });
    }
}
