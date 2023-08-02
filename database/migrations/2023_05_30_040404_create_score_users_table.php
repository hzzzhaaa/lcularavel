<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->string("certificate_number")->nullable();
            $table->string("nomor_peserta");
            $table->string("nama");
            $table->integer("total_score")->nullable();
            $table->integer("a")->nullable();
            $table->integer("b")->nullable();
            $table->integer("c")->nullable();
            $table->integer("d")->nullable();
            $table->integer("e")->nullable();
            $table->timestamps();



            $table->foreign('registration_id')->references('id')->on('registration')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_users');
    }
}
