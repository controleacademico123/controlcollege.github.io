<?php

namespace App\Http\Controllers;
use app\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
  public function listar(){
    $cont = DB::table('users')->count('*');
    $users = DB::table('users')
    ->select('users.*')->where('role','usuario')->orderBy('users.name')->paginate(6);

    return view('listar_usuarios')->with('users', $users)->with('cont',$cont);
  }

  public function delete($id){
    $disciplinas = DB::table('disciplina')
    ->join('users', 'users.id', '=', 'disciplina.id_aluno')
    ->select('disciplina.* ')->where('disciplina.id_aluno',$id)
    ->delete();

    $eventos = DB::table('eventos')
    ->join('users', 'users.id', '=', 'eventos.id_user')
    ->select('eventos.* ')->where('eventos.id_user',$id)
    ->delete();

    $usuario = DB::table('users')
    ->select('eventos.* ')->where('users.id',$id)
    ->delete();

    return Redirect('listar_u');

  }

  public function pesquisar(Request $request){
    $cont = DB::table('users')->count('*');
    $usuario = $request->search;
    $email = strripos($usuario, '@');
    if(!$email){
      $users = DB::table('users')
      ->select('users.*')->where('name',$usuario)->orderBy('users.name')->paginate(6);
    }else {
     $users = DB::table('users')
     ->select('users.*')->where('email',$usuario)->orderBy('users.name')->paginate(6);
   }
    return view('listar_usuarios')->with('users', $users)->with('cont',$cont);
  }
}
