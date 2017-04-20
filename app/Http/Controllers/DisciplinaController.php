<?php

namespace App\Http\Controllers;
use app\Http\Requests;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class DisciplinaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function cadastro(){
    return view('Disciplina.criar_disciplina');
  }
  public function cadastrar(Request $request,$id){
    $disciplina = new Disciplina;
    $disciplina->codigo = $request->codigo;
    $disciplina->nome = $request->nome;
    $disciplina->carga_horaria = $request->carga_horaria;
    $disciplina->id_aluno = $request->id_aluno;
    $disciplina->limite_freq = floor($disciplina->carga_horaria * 0.25);

    $disciplinas = DB::table('users')
    ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
    ->select('disciplina.codigo', 'disciplina.nome')->where('disciplina.codigo',$request->codigo)->where('id',$id)
    ->get();
    $disciplinas2 = DB::table('users')
    ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
    ->select('disciplina.codigo', 'disciplina.nome')->where('disciplina.nome',$request->nome)->where('id',$id)
    ->get();
    if(count($disciplinas) == 0 && count($disciplinas2) == 0){
      if(is_numeric($disciplina->carga_horaria)){
        \Session::flash('flash_message','Disciplina cadastrada com sucesso!');
        $disciplina->save();
      }
      else{
        \Session::flash('flash_message_error','Erro ao cadastrar! Valores são inválidos!');
      }
    }
    else{
      \Session::flash('flash_message_error','Erro ao cadastrar! Disciplina já cadastrada!');
    }


    return redirect('home')->with('message','Disciplina cadastrada com sucesso!');
  }

  public function listar($id){
    $disciplinas = DB::table('users')
    ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
    ->select('disciplina.id_aluno','disciplina.id_disc','disciplina.codigo', 'disciplina.nome', 'disciplina.carga_horaria', 'disciplina.limite_freq',
    'disciplina.faltas', 'disciplina.situacao')->where('disciplina.id_aluno',$id)
    ->orderBy('disciplina.nome')->get();

    return view('Disciplina.listar_disciplinas')->with('disciplinas', $disciplinas);
  }

  public function editar($id,$id_disc){
    $disciplinas = DB::table('users')
    ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
    ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
    ->get();

    return view('Disciplina.editar_disciplina')->with('disciplinas', $disciplinas);

  }

  public function update(Request $request,$id,$id_disc,$nome,$codigo){

    $data = [
      'codigo'=>$request->codigo
      ,'nome'=>$request->nome
      ,'carga_horaria'=>$request->carga_horaria
      ,'limite_freq'=> floor($request->carga_horaria * 0.25)];

      if($data['nome'] == $nome && $data['codigo'] == $codigo){
        \Session::flash('flash_message','Disciplina editada com sucesso!');
        if(is_numeric($request->carga_horaria)){
          $disciplinas = DB::table('users')
          ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
          ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
          ->update($data);
        }
      }else{
        if($data['codigo'] != $codigo && $data['nome'] == $nome || $data['codigo'] != $codigo && $data['nome'] != $nome ){
          $disciplinas2 = DB::table('users')
          ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
          ->select('disciplina.codigo', 'disciplina.nome')->where('disciplina.codigo',$request->codigo)->where('id',$id)
          ->get();
          if(count($disciplinas2) == 0){

            if(is_numeric($request->carga_horaria)){
              \Session::flash('flash_message','Disciplina editada com sucesso!');
              $disciplinas = DB::table('users')
              ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
              ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
              ->update($data);
            }else{
              \Session::flash('flash_message_error','Erro ao editar! Valores são inválidos!');
            }
          }
          else{
            \Session::flash('flash_message_error','Erro ao editar! Disciplina já cadastrada!');
          }
        }
        if($data['codigo'] == $codigo && $data['nome'] != $nome){
          $disciplinas3 = DB::table('users')
          ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
          ->select('disciplina.codigo', 'disciplina.nome')->where('disciplina.nome',$request->nome)->where('id',$id)
          ->get();
          if(count($disciplinas3) == 0){

            if(is_numeric($request->carga_horaria)){
              \Session::flash('flash_message','Disciplina editada com sucesso!');
              $disciplinas = DB::table('users')
              ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
              ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
              ->update($data);
            }else{
              \Session::flash('flash_message_error','Erro ao editar! Valores são inválidos!');
            }
          }
          else{
            \Session::flash('flash_message_error','Erro ao editar! Disciplina já cadastrada!');
          }
        }

      }


      return Redirect('listar_d/'.$id);
    }

    public function add_falta($id,$id_disc,$faltas,$limite_freq,$nome){

      $count = $faltas;
      ++$count;
      //++$count;
      if($count > $limite_freq)
      $situacao = 'reprovado';
      else {
        $situacao = 'favoravel';
      }

      if($count == ($limite_freq)){
        $vetor = [
          'disc' => $nome,
          'mensagem' => "Cuidado! Você atingiu $count faltas! É o limite de faltas dessa disciplina, cuidado para não faltar novamente!",

        ];
        Mail::send('mail_falta', $vetor, function($message) {
           $message->to('controlcollege@gmail.com', 'Usuário CC')->subject
              ('Contato Control College');
           $message->from('controlcollege@gmail.com','Control College');
        });
          \Session::flash('flash_message_error','Cuidado! Você atingiu ' . $count .  ' faltas na disciplina ' . $nome . ' É o limite de faltas dessa disciplina, cuidado para não faltar novamente!!');
      }

      if($count == ($limite_freq+1)){
        $vetor = [
          'disc' => $nome,
          'mensagem' => "Que pena! Você atingiu $count faltas! Assim, você foi reprovado por falta =/ . ",

        ];
          Mail::send('mail_falta', $vetor, function($message) {
             $message->to('controlcollege@gmail.com', 'Usuário CC')->subject
              ('Contato Control College');
           $message->from('controlcollege@gmail.com','Control College');
        });
          \Session::flash('flash_message_error','Que pena! Você atingiu ' . $count .  ' faltas na disciplina ' . $nome . '. Assim, você foi reprovado por falta =/');
      }

      $data = [
        'faltas'=> $count,
        'situacao'=> $situacao
      ];

      $disciplinas = DB::table('users')
      ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
      ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
      ->update($data);



      return Redirect('listar_d/'.$id);
    }
    public function rem_falta($id,$id_disc,$faltas,$limite_freq){
      if($faltas != 0){
        $count = $faltas;
        --$count;
        if($count > $limite_freq)
        $situacao = 'reprovado';
        else {
          $situacao = 'favoravel';
        }

        $data = [
          'faltas'=> $count,
          'situacao'=> $situacao
        ];

        $disciplinas = DB::table('users')
        ->join('disciplina', 'users.id', '=', 'disciplina.id_aluno')
        ->select('disciplina.*')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
        ->update($data);
      }


      return Redirect('listar_d/'.$id);
    }

    public function delete($id,$id_disc){
      $disciplinas = DB::table('disciplina')
      ->join('users', 'users.id', '=', 'disciplina.id_aluno')
      ->select('disciplina.* ')->where('disciplina.id_aluno',$id)->where('id_disc',$id_disc)
      ->delete();


      return Redirect('listar_d/'.$id);

    }



  }
