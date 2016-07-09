<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	//home control muestas las ventanas el proceso viene de route y llega aki para 
	// ejecutar las funciones
	public function showWelcome()
	{
		return View::make('front.login');
	}

//luego de presionar boton guardar q va
// hacia el route y  redireccion aka(homecontrol@logis) entoncs
	public function login() //funcion para logearse
						
	{
		$validaciones = Usuario::validacioneslogin(Input::all());
 		
		if ($validaciones -> fails())
		{
			return Redirect::to('/')->withErrors($validaciones)->withInput();
		}
		else
		{

			$email = Input::get('email');
			$clave = Input::get('clave');
			$usuario=Usuario::where('login','=', $email)->get();// no se hace new xq necesitamos la misma instancia
			
			if ( $usuario->count() == 1 )
			{
				if(Hash::check($clave, $usuario[0]->clave))
				{
					Session::put('id',$usuario[0]->id);
					Session::put('nombre',$usuario[0]->nombre);
					Session::put('login',$usuario[0]->login );
					Session::put('email',$usuario[0]->email );
					Session::put('rol',$usuario[0]->rol );
					Session::put('estatus',$usuario[0]->estatus );
					Session::put('logged',TRUE); //MANDA  una variable q indica logeado
					Session::put('familia_id',$usuario[0]->familia->id);

					return Redirect::to('/dashboard');
				}
				else
				{
					Session::flash('message','La clave no es válida');
					Session::flash('class','danger');
				}		
			}
			else
			{
				Session::flash('message','El Usuario no está registrado');
				Session::flash('class','danger');
			}

			return Redirect::to('/')->withInput();
		}
	}

	public function registrese()
	{
		return View::make('front.registrarse');
	}
	
	public function forgot()
	{
		return View::make('front.forgot');
	}
	public function renew()
	{

		$validaciones = Usuario::validacionesrenew(Input::all());
			
		if ($validaciones -> fails())
		{
			return Redirect::to('/')->withErrors($validaciones)->withInput();
		}
		else
		{

			$postmail = Input::get('email');
			
			$usuario = Usuario::where('login','=', $postmail)->get();
			$email = $usuario[0]->email;
			
			if ( $usuario->count() == 1 )
			{
		    	$hashed = trim(substr(Hash::make(rand(0,999)), -6));
		    	$datos = array('clave' => Hash::make($hashed) );
		    	
				$user = Usuario::where('login','=', $email)->update($datos);
				
				$data = [
					'msj' => 'Nos complace anunciarte que la recuperación de tu clave has sido exitosa',
					'email' => $usuario[0]->email,
					'nombre' => $usuario[0]->nombre,
					'clave' => $hashed,
				 ];

				Mail::send('emails.renew', $data, function($message) use ($usuario)
				{
			  	   	$message->from('sf@sf.com');
			   		$message->to($usuario[0]->email, $usuario[0]->name)->subject('Recuperación de Clave!');
			   

				});
				Session::flash('message','La restauración de la clave ha sido enviada a su correo');
				Session::flash('class','success');
			}
			else
			{
				Session::flash('message','El correo electrónico no está registrado');
				Session::flash('class','danger');
			}
			
			return Redirect::to('/');
	    
		}
	}

	public function guardarregistro()  //clase para optener los campos
	{								// y guardarlos en la base de datos
		$usuario=new Usuario;
		$familia=new Familia;
		
		$validaciones = Usuario::validacionesinsertar(Input::all());

		if ($validaciones -> fails())
		{
			return Redirect::to('/home/registrese')->withErrors($validaciones)->withInput();
		}
		else
		{

			$familia->nombre="";
			$familia->dirección="";
			$familia->telf="";
					
			$usuario->nombre=Input::get('nombre');
			$usuario->login=Input::get('email');
			$usuario->email=Input::get('email');
			$usuario->clave=Hash::make(Input::get('clave'));


			if($usuario->save())
			{
				$familia->usuario()->associate($usuario);
				$familia->save();
				Session::flash('message','Guardado correctamente!');
				Session::flash('class','success');

			}
			else
			{
				Session::flash('messager','Ha ocurrido un error');
				Session::flash('class','danger');
			}
		}

		return Redirect::to('/home/registrese');
		
	}



	public function logout()
	{
		
		Session::flush();
		Session::forget('logged');
		Session::put('logged',FALSE);
		return Redirect::to('/');
	}




}