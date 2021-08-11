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
            $table->string('nik')->unique();
            $table->foreignId('akun_id')->nullable();
            $table->foreignId('cabang_id')->nullable();
            $table->foreignId('ranting_id')->nullable();
            $table->string('status_kepengurusan');
            $table->string('level_kepengurusan')->nullable();
            $table->foreignId('unit_id')->nullable();
            $table->foreignId('jabatan_id')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenkel')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status_anggota');
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
