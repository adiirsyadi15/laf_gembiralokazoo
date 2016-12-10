<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            
            $table->char('id_admin', 3);
            $table->string('username')->unique();
            $table->string('nama', 50);
            $table->string('alamat')->nullable();
            $table->string('no_hp', 12)->nullable();
            $table->string('foto_profile')->nullable();
            $table->timestamps();

            // primary key
            $table->primary('id_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
