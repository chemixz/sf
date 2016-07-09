<?php

class UsuariosController extends \BaseController {

	/**
	 * Display a listing of usuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuario::all();

		return View::make('back.Usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new usuario
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('usuarios.create');
	}

	/**
	 * Store a newly created usuario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validacionesinsertar = Validator::make($data = Input::all(), Usuario::$rules);

		if ($validacionesinsertar->fails())
		{
			return Redirect::back()->withErrors($validacionesinsertar)->withInput();
		}

		Usuario::create($data);

		return Redirect::route('usuarios.index');
	}

	/**
	 * Display the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::findOrFail($id);

		return View::make('usuarios.show', compact('usuario'));
	}

	/**
	 * Show the form for editing the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::find($id);

		return View::make('back.Usuarios.edit', compact('usuario'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Usuario::findOrFail($id);

		$datos = [
			'nombre' => Input::get('nombre'),
			'email' => Input::get('email'),
			'rol' => Input::get('rol'),
			'estatus' => Input::get('estatus'),

		];
		
		$rules = [
			'nombre' => 'required|min:5|max:30',
			'email' => 'required|email|min:5|max:30',
			'rol' => 'required|',
			'estatus' => 'required',
		];
		
		$msj = [
			'nombre.required' => 'El campo <strong>Nombre</strong> esta vacio',
			'nombre.min' => 'El campo <strong>Nombre</strong> debe tener minimo :min caracteres',
			'nombre.max' => 'El campo <strong>Nombre</strong> debe tener maximo :max caracteres',
			'email.required' => 'El campo <strong>Correo electronico</strong> debe tener maximo :max caracteres',
			'email.required' => 'El campo <strong>Correo electronico</strong> es requerido',
		 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
		 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
		 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres',
		 	'rol.required' => 'El campo <strong>Rol</strong> es reqerido',
		 	'estatus.required' => 'El campo <strong>Estatus</strong> es requerido',
		];

		$validator=Validator::make($datos,$rules,$msj);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			$usuario->update(Input::all());
			Session::flash('message','Actualizado Correctamente');
			Session::flash('class','success');
		}

		return Redirect::to('/dashboard/usuarios');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$familia =Familia::where('usuario_id','=',$id)->with('miembro')->get();
		

		$destinationPath = 'uploads/images/';
		foreach ($familia[0]->miembro as $m) {
			File::delete($destinationPath.$m->foto);
		}

		if(Usuario::destroy($id))
		{
			Session::flash('message','Eliminado Correctamente');
			Session::flash('class','success');
			
		}
		else
		{
			Session::flash('message','Error Al Eliminar');
			Session::flash('class','danger');
			
		}
		
		return Redirect::to('/dashboard/usuarios');
	}



	public function defaultpass($id)
	{
		$usuario=Usuario::findOrFail($id);

		$hashed = trim(substr(Hash::make(rand(0,999)), -6));
		$datos =[
			'clave'=>Hash::make($hashed),
		];
		
		$user = Usuario::where('login','=', $usuario->email)->update($datos);

		$data = [
			'msj' => 'Nos complace anunciarte que la recuperación de tu clave has sido exitosa',
			'email' => $usuario->email,
			'nombre' => $usuario->nombre,
			'clave' => $hashed,
		];

		Mail::send('emails.renew', $data, function($message) use ($usuario)
		{
			$message->to($usuario
						->email, $usuario->name)
						->subject('Recuperación de Clave!');
		});

		Session::flash('message','La Nueva Clave ha siedo enviada');
		Session::flash('class','success');
		
		return Redirect::to('/dashboard/usuarios');

	}

	public function userdata($id)
	{
		$usuario = Usuario::find($id);

		return View::make('back.Datosusuarios.index', compact('usuario'));
	}

	public function useredit($id)
	{
		$usuario = Usuario::find($id);

		return View::make('back.Datosusuarios.edit', compact('usuario'));

	}
	public function userupdate($id)
	{
		$usuario = Usuario::findOrFail($id);

		$datos = [
			'nombre' => Input::get('nombre'),
			'email' => Input::get('email'),
			'estatus' => Input::get('estatus'),

		];
		
		$rules = [
			'nombre' => 'required|min:5|max:30',
			'email' => 'required|email|min:5|max:30',
			'estatus' => 'required',
			
		];
		$msj = [
			'nombre.required' => 'El campo <strong>Nombre</strong> esta vacio',
			'nombre.min' => 'El campo <strong>Nombre</strong> debe tener minimo :min caracteres',
			'nombre.max' => 'El campo <strong>Nombre</strong> debe tener maximo :max caracteres',
			'email.required' => 'El campo <strong>Correo electronico</strong> debe tener maximo :max caracteres',
			'email.required' => 'El campo <strong>Correo electronico</strong> es requerido',
		 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
		 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
		 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres', 
		 	'estatus.required' => 'El campo <strong>Estatus</strong> es requerido',
		];

		$validator=Validator::make($datos,$rules,$msj);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			$usuario->update(Input::all());
			Session::flash('message','Actualizado Correctamente');
			Session::flash('class','success');
		}

		return Redirect::to('/dashboard/misdatos/'.$usuario->id);
	}

	public function editpass($id)
	{
		$usuario = Usuario::find($id);

		return View::make('back.Datosusuarios.editpass', compact('usuario'));
	}

	public function updatepass($id)
	{
		$usuario=Usuario::findOrFail($id);

		$validaciones = Usuario::validacionesnewpass(Input::all());

		if ($validaciones -> fails())
		{
			return Redirect::back()->withErrors($validaciones)->withInput();
		}
		else
		{
			$actualclave =Input::get('aclave');
			
			if(Hash::check($actualclave,$usuario->clave))
			{
				$datos = [ 
					'clave' =>Hash::make(Input::get('nclave')),
				];
				
				$user = Usuario::where('login','=', $usuario->email)->update($datos);
				
				$data = [
					'msj' => 'Haz cambiado tu contraseña con exito',
					'email' => $usuario->email,
					'nombre' => $usuario->nombre,
					'clave' => Input::get('nclave'),
					
				];

				Mail::send('emails.renew', $data, function($message) use ($usuario)
				{
					$message->to($usuario->email, $usuario->name)->subject('Recuperación de Clave!');
				});
				Session::flash('message','Contraseña actualizada correctamente!');
				Session::flash('class','success');

				
			}
			else
			{
				Session::flash('message','Clave actual incorrecta! ');
				Session::flash('class','danger');
			}
		}
		return Redirect::to('/dashboard/misdatos/'.$usuario->id);


	}

}