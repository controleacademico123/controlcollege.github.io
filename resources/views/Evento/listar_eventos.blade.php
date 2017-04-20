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
            <th>Nome</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody> @foreach ($eventos as $evento)
      @if( Auth::user()->id == $evento->id_user)
        <tr>
            <td>{{$evento->nome}}</td>
            <td>{{ implode("/", array_reverse(explode("-", $evento->data)))}}</td>
            <td>{{$evento->hora}}</td>

            <td>
              <a  href="{{ route('editar_e',['id' =>Auth::user()->id,'id_evento'=>$evento->id_evento])}}" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              </a>
              <a href="{{ route('delete_e',['id' =>Auth::user()->id,'id_evento'=>$evento->id_evento]) }}" onclick="javascript:if(!confirm('Deseja excluir o evento?'))return false;" class="btn btn-default btn-lg">
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
@endsection
