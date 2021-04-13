<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kpi');
            $table->text('rencana_kegiatan')->nullable();
            $table->string('catatan')->nullable();
            $table->foreignId('unit_id');
            $table->string('target')->nullable();
            $table->string('tahun')->nullable();
            $table->string('waktu')->nullable();
            $table->string('rab')->nullable();
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
        // Schema::drop('users');
        Schema::dropIfExists('kegiatan');
    }
}
