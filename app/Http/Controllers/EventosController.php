<?php

namespace App\Http\Controllers;
use app\Http\Requests;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EventosController extends Controller
{

  public function cadastro(){
    return view('Evento.criar_evento');
  }

  public function cadastrar(Request $request,$id){
    $evento = new Evento;
    $eventos = DB::table('users')
    ->join('eventos', 'users.id', '=', 'eventos.id_user')
    ->select('eventos.nome')->where('eventos.nome',$request->nome)->where('id',$id)
    ->get();
    $evento->nome = $request->nome;
    $evento->hora = $request->hora;

    $evento->data = implode("-", array_reverse(explode("/",$request->data)));
    //$evento->data =  date('y/m/d', strtotime("-10 days",strtotime($evento->data)));
    $evento->id_user = $request->id_user;
    if(count($eventos) == 0){
      \Session::flash('flash_message','Evento cadastrado com sucesso!');
      $evento->save();
    } else{
      \Session::flash('flash_message_error','Erro ao cadastrar! Evento já cadastrado!');
    }

    return redirect('home')->with('message','Evento cadastrado com sucesso!');
  }

  public function listar($id){
    $eventos = DB::table('users')
    ->join('eventos', 'users.id', '=', 'eventos.id_user')
    ->select('eventos.*')->where('eventos.id_user',$id)
    ->orderBy('eventos.nome')->get();

    return view('Evento.listar_eventos')->with('eventos', $eventos);
  }

  public function editar_e($id,$id_evento){

    $eventos = DB::table('users')
    ->join('eventos', 'users.id', '=', 'eventos.id_user')
    ->select('eventos.*')->where('eventos.id_user',$id)->where('id_evento',$id_evento)
    ->get();

    return view('Evento.editar_evento')->with('eventos', $eventos);

  }

  public function update(Request $request,$id,$id_evento,$nome){

    $data = [
      'nome'=>$request->nome
      ,'data'=>implode("-", array_reverse(explode("/",$request->data)))
      ,'hora' =>$request->hora
    ];
    if($data['nome'] == $nome){
      \Session::flash('flash_message','Evento editado com sucesso!');
      $eventos = DB::table('users')
      ->join('eventos', 'users.id', '=', 'eventos.id_user')
      ->select('eventos.*')->where('eventos.id_user',$id)->where('id_evento',$id_evento)
      ->update($data);
    }
    else{
      $eve = DB::table('users')
      ->join('eventos', 'users.id', '=', 'eventos.id_user')
      ->select('eventos.nome')->where('eventos.nome',$request->nome)->where('id',$id)
      ->get();
      if(count($eve) == 0){
        \Session::flash('flash_message','Evento editado com sucesso!');
        $eventos = DB::table('users')
        ->join('eventos', 'users.id', '=', 'eventos.id_user')
        ->select('eventos.*')->where('eventos.id_user',$id)->where('id_evento',$id_evento)
        ->update($data);

      }else{
        \Session::flash('flash_message_error','Erro ao editar! Evento já cadastrado!');
      }

    }
    return Redirect('listar_e/'.$id);

  }

  public function delete($id,$id_evento){
    $eventoss = DB::table('eventos')
    ->join('users', 'users.id', '=', 'eventos.id_user')
    ->select('eventos.* ')->where('eventos.id_user',$id)->where('id_evento',$id_evento)
    ->delete();


    return Redirect('listar_e/'.$id);

  }


}
