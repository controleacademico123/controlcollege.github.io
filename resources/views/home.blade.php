@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Página Inicial</div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
        @else
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_error') !!}</em></div>
        @endif
        @endif
        <div class="panel-body">
          <h1 class="text-center">  Bem vindo(a)!! </h1><br>
          <h2 class="text-center"> Sobre o ControleAcademico</h2><br>
            <p>
              O ControleAcademico é um sistema onde o estudante poderá controlar sua vida acadêmica, assim irá facilitar a sua organização em relação as provas, frequências e muito mais. Será possível:
            </p>
            <ul>
              <li>  a) Controlar sua frequência por disciplina, evitando ser reprovado por falta (<i>O sistema irá enviar um email quando o limite de faltas de uma disciplina estiver próximo de ser atingiado</i>);</li><br>
              <li>  b) Controlar eventos importantes, como provas, seminários ou atividades por disciplina dentre outros.
              </ul>

              <h2 class="text-center"> Sugestões/Falhas </h2>
              <p>Se você encontrar alguma sugestão ou encontrar alguma falha no sistema, favor entrar em contato com controleacademico@gmail.com
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    @endsection
