<?php

class IndicesController extends \BaseController {

	/**
	 * Display a listing of usuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$familia = Familia::where('usuario_id','=',Session::get('id'))->get();

		return View::make('back.Indices.index', compact('familia'));
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

}