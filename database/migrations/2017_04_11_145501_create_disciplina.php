<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('disciplina', function (Blueprint $table) {
           $table->increments('id_disc');
           $table->string('codigo');
           $table->string('nome');
           $table->integer('carga_horaria');
           $table->integer('limite_freq');
           $table->integer('faltas');
           $table->integer('id_aluno');
           $table->foreign('id_aluno')->references('id')->on('users');
           $table->foreign('id_aluno')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('disciplina');
    }
}
