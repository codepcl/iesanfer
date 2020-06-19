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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function($router){
    $router->get('periodos', 'PeriodoController@showAll');
    $router->get('periodos/{id}', 'PeriodoController@showOne');
    $router->post('periodos', 'PeriodoController@create');
    $router->delete('periodos/{id}', 'PeriodoController@delete');
    $router->put('periodos/{id}', 'PeriodoController@update');
    $router->put('periodos/estado/{id}', 'PeriodoController@updateEstado');

    $router->get('perfiles', 'PerfilController@showAll');
    $router->get('perfiles/{id}', 'PerfilController@showOne');
    $router->post('perfiles', 'PerfilController@create');
    $router->delete('perfiles/{id}', 'PerfilController@delete');
    $router->put('perfiles/{id}', 'PerfilController@update');
    $router->put('perfiles/estado/{id}', 'PerfilController@updateEstado');

    $router->post('usuarios', 'AuthController@create');
    $router->post('login', 'AuthController@login');

    $router->get('profile', 'UsuarioController@profile');
    $router->get('usuarios/{id}', 'UsuarioController@singleUser');
    $router->get('usuarios', 'UsuarioController@allUsers');
    $router->put('usuarios/{id}', 'UsuarioController@update');
    $router->delete('usuarios/{id}', 'UsuarioController@delete');
    $router->put('usuarios/estado/{id}', 'UsuarioController@updateEstado');

    $router->get('asistencia', 'Asistenciacontroller@showAll');
    $router->get('asistencia/{id}', 'Asistenciacontroller@showOne');
    $router->post('asistencia', 'Asistenciacontroller@create');
    $router->delete('asistencia/{id}', 'Asistenciacontroller@delete');
    $router->put('asistencia/{id}', 'Asistenciacontroller@update');
    $router->put('asistencia/estado/{id}', 'Asistenciacontroller@updateEstado');
});

