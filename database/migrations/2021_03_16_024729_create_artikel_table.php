<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul', 200);
            $table->string('slug', 200);
            $table->string('isi', 500);
            $table->string('thumbnail')->nullable();
            $table->string('statuspublikasi_id', 10);
            $table->foreignId('kategori_id');
            $table->foreignId('anggota_id');
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
        Schema::dropIfExists('artikel');
    }
}
