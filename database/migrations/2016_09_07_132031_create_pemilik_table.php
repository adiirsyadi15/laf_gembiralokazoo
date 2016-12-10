<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemiliks', function (Blueprint $table) {
            $table->char('id_pemilik', 5);
            $table->string('username', 50)->unique();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('agama', ['islam', 'katolik', 'kristen', 'hindu', 'budha'])->nullable();
            $table->string('no_hp', 12)->nullable();
            $table->string('pin_bbm', 8)->nullable();
            $table->string('line', 30)->nullable();
            $table->enum('whatsapp', ['0','1'])->nullable();
            $table->string('foto_profile')->nullable();
            $table->enum('status_verifikasi', ['0', '1']);
            $table->timestamps();

            // primary key
            $table->primary('id_pemilik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pemiliks');
    }
}
