<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensagemTestMail;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' =>true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware('verified');


Route::get('tarefa/export/{extensao}', 'App\Http\Controllers\TarefaController@export')->name('tarefa.export');

Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
->middleware('verified');


Route::get('/mensagem-teste', function() {
    return new MensagemTestMail();
   //Mail::to('sarah.projeto@gmail.com')->send(new MensagemTestMail());
   //return 'E-mail enviado com sucesso';
});


Route::get('/access-denied', function () {
    return view('access-denied');
})->name('access.denied');
