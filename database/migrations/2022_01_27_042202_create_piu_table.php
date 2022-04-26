<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiuTable extends Migration
{
  
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piu', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->autoIncrement();
            $table->string('name');
            $table->text('NoHp',13);
            $table->string('email',100)->unique();
            $table->string('jenis_kelamin',10);
            $table->string('Provinsi',100)->nullable();
            $table->string('Kota',100)->nullable();
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
        Schema::dropIfExists('users');
    }
}