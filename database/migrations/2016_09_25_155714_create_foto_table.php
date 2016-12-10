<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id_foto');
            $table->char('id_barang', 5);
            $table->string('nama', 100);
           
            $table->timestamps();

            // foreign key
            $table->foreign('id_barang')->references('id_barang')->on('barangs');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fotos');
    }
}
