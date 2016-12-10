3<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses', function (Blueprint $table) {
            $table->char('id_proses', 7);
            $table->char('id_petugas', 3)->nullable();
            $table->char('id_pemilik', 5)->nullable();
            $table->integer('id_kejadian')->unsigned();
            $table->timestamps();

            // primary key
            $table->primary('id_proses');
            // foreign key
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
            
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemiliks');
            $table->foreign('id_kejadian')->references('id_kejadian')->on('kejadians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proses');
    }
}
