<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before'=>'verSiLogin'),function() 
{
	Route::get('/', 'HomeController@showWelcome');
	Route::get('/home/registrese','HomeController@registrese');
	Route::get('/home/forgot','HomeController@forgot');
	Route::post('/home/guardarregistro', 'HomeController@guardarregistro'); //nos manta a una ruta
	Route::post('/home/renew', 'HomeController@renew'); //nos manta a una ruta
	Route::post('/home/login', 'HomeController@login');
});
Route::get('/logout', 'HomeController@logout');

 //ruta para deslogear LOGOUT

//Route::get('/dashboard', 'DashboardController@index');//->before('/home/login');

Route::group(array('before'=>'autenticacion'),function() 
{	// autentication me manda a un filtro para ver si esta logeado me manda a filter en la funcion autentication y alli verifica
	Route::get('/dashboard', 'DashboardController@index'); //luego de autenticar esto me manda al cotrollers/dasboardcontroller

	Route::group(array('before'=>'autenticacionAdmin'),function() 
	{
		//conceptos
		Route::get('/dashboard/conceptos','ConceptosController@index');
		Route::get('/dashboard/conceptos/create','ConceptosController@create');
		Route::post('/dashboard/conceptos/store','ConceptosController@store');
		Route::get('/dashboard/conceptos/edit/{id}','ConceptosController@edit');
		Route::post('/dashboard/conceptos/update/{id}','ConceptosController@update');
		Route::get('/dashboard/conceptos/destroy/{id}','ConceptosController@destroy');
		//usuarios
		Route::get('/dashboard/usuarios', 'UsuariosController@index');
		Route::get('/dashboard/usuarios/edit/{id}', 'UsuariosController@edit');
		Route::post('/dashboard/usuarios/update/{id}', 'UsuariosController@update');
		Route::get('/dashboard/usuarios/destroy/{id}', 'UsuariosController@destroy');
		Route::get('/dashboard/usuarios/resetear/{id}', 'UsuariosController@defaultpass');

		Route::get('/dashboard/lfamilias', 'FamiliasListarController@index');
		
	});

	//Datos del usuario
	Route::get('/dashboard/misdatos/{id}', 'UsuariosController@userdata');
	Route::get('/dashboard/misdatos/edit/{id}', 'UsuariosController@useredit');
	Route::post('/dashboard/misdatos/update/{id}', 'UsuariosController@userupdate');
	Route::get('/dashboard/misdatos/editpassword/{id}', 'UsuariosController@editpass');
	Route::post('/dashboard/misdatos/updatepassword/{id}', 'UsuariosController@updatepass');
	
	//familias
	Route::get('/dashboard/familia', 'FamiliasController@index');
	Route::post('/dashboard/familia/update/{id}', 'FamiliasController@update');
	//miembros
	Route::get('/dashboard/miembros','MiembrosController@index');
	Route::get('/dashboard/miembros/create','MiembrosController@create');
	Route::post('/dashboard/miembros/store','MiembrosController@store');
	Route::get('/dashboard/miembros/edit/{id}','MiembrosController@edit');
	Route::post('/dashboard/miembros/update/{id}','MiembrosController@update');
	Route::get('/dashboard/miembros/destroy/{id}','MiembrosController@destroy');
	
	
	// metas
	Route::get('/dashboard/miembros/metas/create/{id}','MetasController@create');
	Route::get('/dashboard/miembros/metas/edit/{id}/{miembro}','MetasController@edit');
	Route::get('/dashboard/miembros/metas/{id}','MetasController@index');
	Route::post('/dashboard/miembros/metas/store/{id}','MetasController@store');
	Route::get('/dashboard/miembros/metas/destroy/{id}','MetasController@destroy');
	Route::post('/dashboard/miembros/metas/update/{id}','MetasController@update');
	//concepto miembros
	Route::get('/dashboard/conceptosmiembros/{id}','ConceptosMiembrosController@index');
	Route::get('/dashboard/conceptosmiembros/create/{id}','ConceptosMiembrosController@create');
	Route::post('/dashboard/conceptosmiembros/store/{id}','ConceptosMiembrosController@store');
	Route::get('/dashboard/conceptosmiembros/edit/{id}','ConceptosMiembrosController@edit');
	Route::post('/dashboard/conceptosmiembros/update/{id}','ConceptosMiembrosController@update');
	Route::get('/dashboard/conceptosmiembros/destroy/{id}','ConceptosMiembrosController@destroy');

	//Balances
	Route::get('/dashboard/balance','BalancesController@index');

	//Indices
	Route::get('/dashboard/indice','IndicesController@index');
	Route::post('/getData','BalancesController@getData');

});


