<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('paymentmethod_id');
            $table->string('registration_number')->nullable();
            $table->enum('status', ['requested', 'verified'])->default('requested');
            $table->string("site");
            $table->string("payment_evidence_img");
            $table->enum('payment_status',['belum lunas','lunas'])->default('belum lunas');
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
        Schema::dropIfExists('registration_tables');
    }
}
