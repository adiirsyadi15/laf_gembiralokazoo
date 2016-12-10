<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->char('id_barang', 5);
            $table->integer('id_kategori')->unsigned();
            $table->string('nama', 50);
            $table->string('ciri_ciri');
            
            $table->timestamps();

            $table->primary('id_barang');
            // foreign key
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
       
        });
    }

   
    public function down()
    {
        Schema::drop('barangs');
    }
}
