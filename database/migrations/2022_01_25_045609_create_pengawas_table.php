<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('name');
            $table->text('NoHp',13);
            $table->string('email',100)->unique();
            $table->string('jenis_kelamin',10);
            $table->string('Provinsi')->nullable();
            $table->string('Kota')->nullable();
            $table->string('password');
            $table->string('Status_Aktif')->nullable();
            $table->integer('Created_By')->nullable();
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
        Schema::dropIfExists('pengawas');
    }
}
