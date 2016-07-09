<?php

class MiembrosController extends \BaseController {

	/**
	 * Display a listing of miembros
	 *
	 * @return Response
	 */
	public function index()
	{
		$miembros = Miembro::where('familia_id','=',session::get('familia_id'))->get();
		$familia = Familia::where('usuario_id','=',Session::get('id'))->get();
			// $miembros=Miembro::orderBy('created_at','desc')->limit(2)->get();
		
		return View::make('back.Miembros.index', compact('miembros','familia'));
	}

	/**
	 * Show the form for creating a new miembro
	 *
	 * @return Response
	 */
	public function create()
	{
		$familia = Familia::where('usuario_id','=',Session::get('id'))->get();
		return View::make('back.Miembros.create',compact('familia'));
	}

	/**
	 * Store a newly created miembro in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validator =Miembro::validator(Input::all());
		

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$datos = Input::all();

		if (Input::file('foto'))
		{
			$file = Input::file('foto');		
			$destinationPath = 'uploads/images/';
			$filename = Str::random(20) .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);
			$datos['foto'] = $filename;
		}
	
		
		Miembro::create($datos);
		Session::flash('message','Guardado Correctamente');
		Session::flash('class','success');
		

		return Redirect::to('dashboard/miembros');
	}

	/**
	 * Display the specified miembro.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$miembro = Miembro::findOrFail($id);

		return View::make('back.Miembros.show', compact('miembro'));
	}

	/**
	 * Show the form for editing the specified miembro.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$miembro = Miembro::find($id);

		return View::make('back.Miembros.edit', compact('miembro'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$miembro = Miembro::findOrFail($id);

		$validator =Miembro::validatorUpdate(Input::all());
		

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$datos = Input::all();
		if (Input::file('foto')) {
			$file = Input::file('foto');		
			$destinationPath = 'uploads/images/';
			$filename = Str::random(20) .'.'. $file->getClientOriginalExtension();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$upload_success = $file->move($destinationPath,$filename);
			
			File::delete($destinationPath.$miembro->foto);
			
			$datos['foto'] = $filename;
		}
		else
		{
			unset($datos['foto']);
		}
		
		$miembro->update($datos);

		Session::flash('message','¡Actualizado Correctamente!');
		Session::flash('class','success');
		return Redirect::to('dashboard/miembros');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$miembro = Miembro::findOrFail($id);
		$destinationPath = 'uploads/images/';
		File::delete($destinationPath.$miembro->foto);

		if($miembro::destroy($id))
		{
			
			Session::flash('message','Eliminado Correctamente');
			Session::flash('class','success');
		}
		else
		{
			Session::flash('message','Error Al Eliminar');
			Session::flash('class','danger');
			
		}
		
		return Redirect::to('dashboard/miembros');
	}

}