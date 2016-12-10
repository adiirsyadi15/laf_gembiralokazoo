<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
           
            $table->char('id_petugas', 3);
            $table->string('username', 50)->unique();
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('agama', ['islam', 'katolik', 'kristen', 'hindu', 'budha'])->nullable();
            $table->string('no_hp', 12)->nullable();
            $table->string('foto_profile')->nullable();
            // $table->string('foto_profile');
            $table->timestamps();

            // primary key
            $table->primary('id_petugas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('petugas');
    }
}
