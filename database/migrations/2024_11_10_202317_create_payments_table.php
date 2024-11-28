<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('membership_id');
            $table->string('invoice_number');
            $table->string('membership_type');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('amount');
            $table->enum('payment_status', ['paid', 'unpaid', 'upcoming_due']);
            $table->enum('payment_method', ['cash', 'e-wallet']);
            $table->timestamp('created_on')->useCurrent();

            // Definisikan foreign key
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}




