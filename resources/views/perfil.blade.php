@extends('layouts.app')

@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            -<th>Ações</th>

          </tr>
    </thead>
    <tbody> @foreach ($profile as $prof)
        <tr>
            <td>{{$prof->name}}</td>
            <td>{{$prof->email}}</td>
            <td>
              <p>Caso queira editar alguma informação favor entrar em contato.</p>
            </td>

        </tr> @endforeach </tbody>
</table>
@endsection
