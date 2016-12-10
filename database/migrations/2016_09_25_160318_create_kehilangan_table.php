<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKehilanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehilangans', function (Blueprint $table) {
            $table->char('id_kehilangan', 5);
            $table->char('id_barang', 5);
            $table->char('id_proses', 7);
            $table->enum('status_kehilangan', ['hilang','ditemukan']);
            $table->timestamps();

            // primay key kehilangan
            $table->primary('id_kehilangan');

            // foreign key barangs
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
        Schema::drop('kehilangans');
    }
}
