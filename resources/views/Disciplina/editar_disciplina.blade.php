@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar disciplina</div>
                <div class="panel-body">
                  @foreach ($disciplinas as $disc)
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_d',['id' =>Auth::user()->id,'id_disc'=>$disc->id_disc,'nome'=>$disc->nome,'codigo'=>$disc->codigo])}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ $disc->codigo }}" required autofocus>

                                @if ($errors->has('codigo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $disc->nome }}" required>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="carga_horaria" class="col-md-4 control-label">Carga Horária</label>

                            <div class="col-md-6">
                                <input id="carga_horaria" type="number" class="form-control" name="carga_horaria" value="{{ $disc->carga_horaria }}" required>

                                @if ($errors->has('carga_horaria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carga_horaria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-6">
                                <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{Auth::user()->id}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    Resetar
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
