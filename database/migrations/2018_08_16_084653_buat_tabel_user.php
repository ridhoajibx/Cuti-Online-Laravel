<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('telpon')->nullable();
            $table->smallInteger('status')->nullable();
            $table->enum('jns_klmin',['PRIA','WANITA'])->nullable();
            $table->date('tanggal_lahir')->default('2001-01-01');

            $table->unsignedInteger('status_karyawan_id')->nullable();
            $table->unsignedInteger('jabatan_id')->nullable();
            $table->unsignedInteger('user_level_id')->nullable();

            $table->foreign('status_karyawan_id')->references('id')->on('status_karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_level_id')->references('id')->on('level_users')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
