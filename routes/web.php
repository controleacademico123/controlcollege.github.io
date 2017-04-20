<?php
use App\Disciplina;
use App\Mail\KryptoniteFound;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*ROTAS  EMAIL*/
Route::post('email', ['as' =>'email', 'uses' => 'UserController@email']);

/* ROTAS INICIAIS*/
Route::auth();
Route::get('/', 'HomeController@index');

/* ROTAS SESSION*/
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');
Route::get('home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

/* ROTAS LOGIN/LOGOUT*/
Route::get('login', ['as' =>'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

/* ROTAS DIVERSAS*/
Auth::routes();
Route::get('/home', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index');
Auth::routes();
Route::get('home', 'HomeController@index');

/* ROTAS DISCIPLINAS*/
Route::get('cadastra_d',['as' => 'cadastra_d', 'uses' => 'DisciplinaController@cadastro']);
Route::get('cadastro_disciplina', 'DisciplinaController@cadastrar');
Route::post('cadastro_d/{id}/',['as' => 'cadastro_d', 'uses' => 'DisciplinaController@cadastrar']);
Route::get('listar_d/{id}/',['as' => 'listar_d', 'uses' => 'DisciplinaController@listar']);
Route::any('add_falta/{id}/{id_disc}/{faltas}/{limite_freq}/{nome}',['as' => 'add_falta', 'uses' => 'DisciplinaController@add_falta']);
Route::get('rem_falta/{id}/{id_disc}/{faltas}/{limite_freq}/',['as' => 'rem_falta', 'uses' => 'DisciplinaController@rem_falta']);
Route::get('editar_d/{id}/{id_disc}/',['as' => 'editar_d', 'uses' => 'DisciplinaController@editar']);
Route::get('delete_d/{id}/{id_disc}/',['as' => 'delete_d', 'uses' => 'DisciplinaController@delete']);
Route::any('update_d/{id}/{id_disc}/{nome}/{codigo}/',['as' => 'update_d', 'uses' => 'DisciplinaController@update']);

/* ROTAS EVENTOS*/
Route::get('cadastra_e',['as' => 'cadastra_e', 'uses' => 'EventosController@cadastro']);
Route::get('listar_e/{id}/',['as' => 'listar_e', 'uses' => 'EventosController@listar']);
Route::get('editar_e/{id}/{id_evento}',['as' => 'editar_e', 'uses' => 'EventosController@editar_e']);
Route::post('cadastro_e/{id}/',['as' => 'cadastro_e', 'uses' => 'EventosController@cadastrar']);
Route::get('delete_e/{id}/{id_evento}/',['as' => 'delete_e', 'uses' => 'EventosController@delete']);
Route::any('update_e/{id}/{id_evento}/{nome}/',['as' => 'update_e', 'uses' => 'EventosController@update']);

/* ROTAS USUARIO/ADMIN*/
Route::get('perfil/{id}/',['as' => 'perfil', 'uses' => 'UserController@perfil']);
Route::get('editar_p/{id}',['as' => 'editar_p', 'uses' => 'UserController@editar_p']);
Route::get('update_p/{id}/',['as' => 'update_p', 'uses' => 'UserController@update_p']);
Route::get('listar_u',['as' => 'listar_u', 'uses' => 'AdminController@listar']);
Route::get('delete_u/{id}/',['as' => 'delete_u', 'uses' => 'AdminController@delete']);
Route::post('pesquisar_u',['as' => 'pesquisar_u', 'uses' => 'AdminController@pesquisar']);
Route::get('contato/{id}/',['as' => 'contato', 'uses' => 'UserController@contato']);
Route::post('contato_u/',['as' => 'contato_u', 'uses' => 'UserController@contato_u']);
