@extends('layouts.app')


@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@else
@if(Session::has('flash_message_error'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_error') !!}</em></div>
@endif
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Carga horária</th>
            <th>Limite de frequência</th>
            <th>Faltas</th>
            <th>Situação</th>
            <th>Ações (+|- : Adicionar/retirar falta)</th>
        </tr>
    </thead>
    <tbody> @foreach ($disciplinas as $disc)
      @if( Auth::user()->id == $disc->id_aluno)

        <tr>
            <td>{{$disc->codigo}}</td>
            <td>{{$disc->nome}}</td>
            <td>{{$disc->carga_horaria}}</td>
            <td>{{$disc->limite_freq}}</td>
            <td>{{$disc->faltas}}</td>
            <td>{{$disc->situacao}}</td>
            <td>

              <a onclick="javascript:if(!confirm('Deseja adicionar uma falta?'))return false;" href="{{ route('add_falta', ['id' =>Auth::user()->id,'id_disc'=>$disc->id_disc,'faltas'=>$disc->faltas,'limite_freq'=>$disc->limite_freq,'nome'=>$disc->nome]) }}" class="btn btn-default btn-lg" >

                <span class="glyphicon glyphicon-plus"  aria-hidden="true"  ></span>
              </a>
              <a onclick="javascript:if(!confirm('Deseja retirar uma falta?'))return false;" href="{{ route('rem_falta', ['id' =>Auth::user()->id,'id_disc'=>$disc->id_disc,'faltas'=>$disc->faltas,'limite_freq'=>$disc->limite_freq]) }}" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
              </a>
              <a  href="{{ route('editar_d',['id' =>Auth::user()->id,'id_disc'=>$disc->id_disc])}}" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              </a>
              <a href="{{ route('delete_d',['id' =>Auth::user()->id,'id_disc'=>$disc->id_disc]) }}" onclick="javascript:if(!confirm('Deseja excluir a disciplina?'))return false;" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </a>
            </td>
            @else
              <script>
                alert("Você não está autorizado a visualizar essas informações!");

              </script>
              <?php
                echo '<meta http-equiv="refresh" content="0;URL=/" />';
              ?>


            @endif
        </tr> @endforeach </tbody>
</table>
<h5 class="text-center">Obs.: Lembrar que um dia que faltou é equivalente a 2 faltas!!</h5>
@endsection
