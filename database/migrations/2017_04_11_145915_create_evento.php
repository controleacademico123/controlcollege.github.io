<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('eventos', function (Blueprint $table) {
           $table->increments('id_evento');
           $table->string('nome');
           $table->datetime('data');
           $table->integer('id_user');
           $table->foreign('id_user')->references('id')->on('users');
           $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
           $table->rememberToken();
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
