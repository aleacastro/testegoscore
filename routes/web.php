<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return view('index');
});

$app->post('/create-emprestimo',      'EmprestimoController@store');
$app->get('/read-emprestimos',        'EmprestimoController@index');
$app->get('/read-emprestimo/{id}',    'EmprestimoController@show');
$app->post('/edit-emprestimo/{id}',   'EmprestimoController@update');
$app->post('/delete-emprestimo/{id}', 'EmprestimoController@destroy');
$app->get('/matriz',        'LogicaController@matrizParImpar');
$app->get('/idade',        'LogicaController@idade');
$app->get('/palavra',        'LogicaController@palavra');
$app->get('/fibonacci',        'LogicaController@index');