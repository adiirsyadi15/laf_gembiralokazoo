<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            // $table->char('id_identitas',3);
            $table->increments('id_identitas');
            $table->char('id_pemilik', 5);
            $table->string('jenis_identitas', 20);
            $table->string('nomor_identitas', 20);
            $table->string('gambar');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // primary key
            // $table->primary('id_identitas');
            
            // foreign key
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemiliks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('identitas');
    }
}
