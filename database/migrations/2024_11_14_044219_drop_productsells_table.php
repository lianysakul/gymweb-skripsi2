<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductsellsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('productsells');
    }

    public function down()
    {
        Schema::create('productsells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('user_id');
            $table->string('training_type');
            $table->unsignedBigInteger('total_amount');
            $table->enum('payment_status', ['on going', 'upcoming due', 'expired']);
            $table->enum('payment_method', ['cash', 'e-wallet']);
            $table->timestamp('created_on')->useCurrent();
            $table->text('description')->nullable();
            $table->timestamps();

            // Definisikan foreign key
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}

