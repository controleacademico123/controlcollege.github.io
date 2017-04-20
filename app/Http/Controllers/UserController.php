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
class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function perfil($id){
      $profile = DB::table('users')
      ->select('users.*')->where('users.id',$id)
      ->get();

      return view('perfil')->with('profile', $profile);
  }
  public function editar_p($id){
      $profile = DB::table('users')
      ->select('users.*')->where('users.id',$id)
      ->get();

      return view('edit_user')->with('profile', $profile);
  }

  public function update_p(Request $request,$id){
      $data = [
        'name'=>$request->name
        ,'email'=>$request->email
      ];

        $users = DB::table('users')
        ->select('*')->where('id',$id)
        ->update($data);

      return Redirect('perfil/'.$id);

  }

  public function contato($id){
      $profile = DB::table('users')
      ->select('users.*')->where('users.id',$id)
      ->get();

      return view('contato')->with('profile', $profile);
  }

  public function email(Request $request){
      $data = [
        'name'=>$request->name,
        'email'=>$request->email,
        'mensagem'=>$request->mensagem
      ];

      Mail::send('mail', $data, function($message) {
         $message->to('controlcollege@gmail.com', 'Usuário CC')->subject
            ('Contato Control College');
         $message->from('controlcollege@gmail.com','Control College');
      });

      \Session::flash('flash_message',' A Mensagem foi enviada, retornaremos em breve.');

      return view('home');
   }


}
