@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contato</div>
                <div class="panel-body">
                    @foreach ($profile as $prof)
                    <form class="form-horizontal" style="float:left;" role="form" method="POST" action="{{ route('email')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" style="width:200%;" value="{{ $prof->name }}"  required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"  name="email" style="width:200%;" value="{{$prof->email }}"  required autofocus>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">Mensagem</label>

                            <div class="col-md-6">
                                  <textarea class="form-control" rows="7"  style="width:300%;" id="mensagem" name="mensagem"></textarea>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mensagem') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group">

                            <div class="col-md-6">
                                <input id="id_user" type="hidden" class="form-control" name="id_user" value="{{Auth::user()->id}}" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
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
