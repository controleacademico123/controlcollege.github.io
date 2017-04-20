@extends('layouts.app')

@section('content')
<h5 class="text-center"> {{$cont-1}} usuários cadastrados!</h5>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody> @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>

            <td>

              <a href="{{ route('delete_u',['id'=>$user->id]) }}" onclick="javascript:if(!confirm('Deseja excluir o usuário?'))return false;" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </a>
            </td>

        </tr> @endforeach </tbody>
</table>
<div class="text-center">
  {!! $users->links();!!}
</div>
<br><br>

@endsection
