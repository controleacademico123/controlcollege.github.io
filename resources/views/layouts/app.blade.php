<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/confirmar.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Controle Acadêmico</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        Controle Acadêmico
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                          @if (Auth::user()->role == 'admin')
                          <form class="navbar-form navbar-left" method="POST" role="search" action="{{ route('pesquisar_u') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <input type="text" name="search" id="search" class="form-control" placeholder="Buscar por nome ou email">
                            </div>
                            <button type="submit" class="btn btn-default">Pesquisar</button>
                          </form>
                          <li class="dropdown">
                              <a href="listar_u" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Usuários <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                   <a href="{{ route('listar_u') }}">
                                        Listar
                                  </a>

                                  </li>
                              </ul>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Disciplinas <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                    <a href="{{ route('cadastra_d') }}">
                                        Cadastrar
                                    </a>

                                    <a href="{{ route('listar_d', Auth::user()->id) }}">
                                        Listar
                                    </a>

                                  </li>
                              </ul>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Eventos <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                    <a href="{{ route('cadastra_e') }}">
                                        Cadastrar
                                    </a>

                                    <a href="{{ route('listar_e', Auth::user()->id) }}">
                                        Listar
                                    </a>

                                  </li>
                              </ul>
                          </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ route('perfil', Auth::user()->id) }}">
                                          Perfil
                                      </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                         @endif
                         @if (Auth::user()->role == 'usuario')
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Disciplinas <span class="caret"></span>
                             </a>

                             <ul class="dropdown-menu" role="menu">
                                 <li>
                                   <a href="{{ route('cadastra_d') }}">
                                       Cadastrar
                                   </a>

                                   <a href="{{ route('listar_d', Auth::user()->id) }}">
                                       Listar
                                   </a>

                                 </li>
                             </ul>
                         </li>
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Eventos <span class="caret"></span>
                             </a>

                             <ul class="dropdown-menu" role="menu">
                                 <li>
                                   <a href="{{ route('cadastra_e') }}">
                                       Cadastrar
                                   </a>

                                   <a href="{{ route('listar_e', Auth::user()->id) }}">
                                       Listar
                                   </a>

                                 </li>
                             </ul>
                         </li>
                         <li>
                             <a href="{{ route('contato',Auth::user()->id) }}" aria-expanded="false">
                                 Contato
                             </a>
                         </li>
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   {{ Auth::user()->name }} <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu" role="menu">
                                   <li>
                                     <a href="{{ route('perfil', Auth::user()->id) }}">
                                         Perfil
                                     </a>
                                       <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                           Logout
                                       </a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>

                                   </li>
                               </ul>
                           </li>
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')
    </div>

    <footer class="rodape navbar-fixed-bottom">
        <div class="container text-center">
            <small class="desenvolvido" > Desenvolvido por Tiago Dória</small>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
