<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')->references('id')->on('artikel')->onDelete('cascade');
            $table->unsignedBigInteger('tags_id');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('artikel_tags');
    }
}
