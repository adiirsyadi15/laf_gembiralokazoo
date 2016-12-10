<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penemuans', function (Blueprint $table) {
            $table->char('id_penemuan', 5);
            $table->char('id_barang', 5);
            $table->char('id_proses', 7);
            $table->string('nama_penemu', 50)->nullable();
            $table->date('tanggal_pengambilan')->nullable();
            $table->enum('status_pengambilan', ['diambil', 'belum diambil']);
            
            $table->timestamps();


            // primary key penemuans
            $table->primary('id_penemuan');

            // foreign key barang
            $table->foreign('id_barang')->references('id_barang')->on('barangs');

            // foreign key proses
            $table->foreign('id_proses')->references('id_proses')->on('proses');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penemuans');
    }
}
