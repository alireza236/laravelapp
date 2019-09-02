<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dosen');
            $table->integer('nidn')->unique();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::table('mata_kuliah', function ($table) {

            $table->foreign('id_dosen')->references('id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropForeign(['id_dosen']);
        });

         Schema::drop('dosen');
    }
}
