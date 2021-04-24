<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_anggota');
            $table->date('tgl_lahir');
            $table->string('pekerjaan');
            $table->string('nik');
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('unit_id');
            $table->foreignId('akun_id')->nullable();
            $table->foreignId('jabatan_id');
            $table->foreignId('ranting_id');
            $table->foreignId('cabang_id');
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
        Schema::dropIfExists('anggota');
    }
}
