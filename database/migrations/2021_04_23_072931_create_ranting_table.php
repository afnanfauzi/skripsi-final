<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRantingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_ranting');
            $table->string('anggota_id');
            $table->string('jmlh_anggota')->nullable();
            $table->string('status_ranting');
            $table->string('cabang_id');
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
        Schema::dropIfExists('ranting');
    }
}
