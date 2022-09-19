<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string("nama");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir")->format('Y/m/d');
            $table->string("alamat");
            $table->string("no_telp");
            $table->string("jenis_kelamin");
            $table->string("kewarganegaraan");
            $table->biginteger("nim");
            $table->string("prodi");
            $table->string("jenjang");
            $table->string("angkatan");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinfos');
    }
}
