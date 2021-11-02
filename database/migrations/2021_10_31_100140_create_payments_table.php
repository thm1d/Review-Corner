<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('method');
            $table->string('tranx_id')->nullable();
            $table->integer('sender_number')->nullable();
            $table->integer('contact_number')->nullable();
            $table->integer('depositor_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('bank_account_no')->nullable();
            $table->integer('status')->default('0');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
