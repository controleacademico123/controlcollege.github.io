@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '-',
    dateSigns: '-',
    patterns: {
        d: "dd-mm-yy"
    }
}
};
</script>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar eventos</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('cadastro_e', Auth::user()->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Ex.: Prova de Banco de Dados" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">Data</label>

                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control"  name="data" value="{{ old('data') }}" placeholder="YYYY-MM-DD" required autofocus>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hora') ? ' has-error' : '' }}">
                            <label for="hora" class="col-md-4 control-label">Horário</label>
                          <div class="col-md-6">
                              <input id="hora" type="time" class="form-control" name="hora" value="{{ old('hora') }}" placeholder="HH:MM Ex.: 06:40" required autofocus>

                              @if ($errors->has('hora'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('data') }}</strong>
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
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<h5 class="text-center">Para navegadores Firefox/IE, favor digitar os ":" para horários "quebrados"  no campo 'Horário'.
A data deve ser no formato DD-MM-YYYY</h5>
<br><br><br><br>



@endsection
