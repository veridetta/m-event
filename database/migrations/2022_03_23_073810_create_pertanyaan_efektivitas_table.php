<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanEfektivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_efektivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('piu_id')->nullable();
            $table->foreignId('kegiatan_id')->nullable();
            $table->string('kegiatan');
            $table->string('kategori1')->nullable();
            $table->text('pertanyaan1');
            $table->text('kategori2')->nullable();
            $table->text('pertanyaan2')->nullable();
            $table->text('kategori3')->nullable();
            $table->text('pertanyaan3')->nullable();
            $table->text('kategori4')->nullable();
            $table->text('pertanyaan4')->nullable();
            $table->text('kategori5')->nullable();
            $table->text('pertanyaan5')->nullable();
            $table->text('kategori6')->nullable();
            $table->text('pertanyaan6')->nullable();
            $table->text('kategori7')->nullable();
            $table->text('pertanyaan7')->nullable();
            $table->text('kategori8')->nullable();
            $table->text('pertanyaan8')->nullable();
            $table->text('kategori9')->nullable();
            $table->text('pertanyaan9')->nullable();
            $table->text('kategori10')->nullable();
            $table->text('pertanyaan10')->nullable();
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
        Schema::dropIfExists('pertanyaan_efektivitas');
    }
}
