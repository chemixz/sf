<?php

class MetasController extends \BaseController {

	/**
	 * Display a listing of metas
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$datos = [
				'metas'=> Meta::where('miembro_id','=',$id)->orderBy('prioridad','desc')->get(),
				'miembro'=>Miembro::find($id),

		];

		$cont=count($datos['metas']);
		if ($cont>0) {
			for ($i=0; $i <$cont ; $i++)
			{ 
				$datos['metas'][$i]->fecha_limite = Datemanager::date2normal($datos['metas'][$i]->fecha_limite);
			}
			
		}

				

		return View::make('back.Metas.index')->with($datos);
	}

	/**
	 * Show the form for creating a new meta
	 *
	 * @return Response
	 */
	public function create($id)
	{

		$maxP = Meta::where('miembro_id','=',$id)->sum('prioridad');
		
		$m = 100 - $maxP;

		$datos = [
				'metas'=> Meta::where('miembro_id','=',$id)->get(),
				'miembro'=>Miembro::find($id),
				'maxP' => $m
		];
		// $metas = Meta::where('miembro_id','=',$id)->get();
		return View::make('back.Metas.create')->with($datos);
	}

	/**
	 * Store a newly created meta in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$datos =Input::all();

		$rules = [
			'descripcion' => 'required|min:5|max:100',
			'descripcion' => 'required|min:5|max:50',
			'metabs' => 'required|min:2|numeric',
			'prioridad' => 'required|numeric|max:'.Input::all()['maxP'],
			'fecha_limite' => 'required',

		];

		$mensajes = [
			'descripcion.required' => 'El campo <strong>Correo Descripción</strong> es requerido',
			'descripcion.min' => 'El campo <strong>descripción</strong> debe contener minimo :min carecteres',
			'descripcion.max' => 'El campo <strong>descripción</strong> debe contener maximo :max carecteres',
			'metabs.required' => 'El campo <strong>Metas Bf </strong> es requerido',
			'metabs.numeric' => 'El campo <strong>Metas Bf </strong> debe ser numerico',
			'prioridad.required' => 'Debe elegir una prioridad',
			'prioridad.numeric' => 'La prioridad debe ser un valor numérico',
			'prioridad.max' => 'La prioridad debe ser un valor numérico de máximo '.Input::all()['maxP'],
			'fecha_limite.required' => 'El campo <strong>Fecha Limite </strong> es requerido',
		
		];

		$validator = Validator::make($datos, $rules, $mensajes );


		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$datos['fecha_limite'] = Datemanager::date2db($datos['fecha_limite']);
		Meta::create($datos);

		Session::flash('message','Meta Guardada Correctamente');
		Session::flash('class','success');
		return Redirect::to('/dashboard/miembros/metas/'.$id);
	}

	/**
	 * Display the specified meta.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$meta = Meta::findOrFail($id);

		return View::make('metas.show', compact('meta'));
	}

	/**
	 * Show the form for editing the specified meta.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,$miembro)
	{

		$maxP = Meta::where('miembro_id','=',$miembro)->sum('prioridad');
		$meta = Meta::find($id);

		$m = $meta->prioridad + (100 - $maxP);
		
		$datos = [
				'meta'=> $meta,
				'maxP' => $m
		];

		$datos['meta']->fecha_limite = Datemanager::date2normal($datos['meta']->fecha_limite);
		
		return View::make('back.Metas.edit')->with($datos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$meta = Meta::findOrFail($id);
		$datos =Input::all();

		$rules = [
			'descripcion' => 'required|min:5|max:100',
			'descripcion' => 'required|min:5|max:50',
			'metabs' => 'required|min:2|numeric',
			'prioridad' => 'required|numeric|max:'.Input::all()['maxP'],
			'fecha_limite' => 'required',

		];

		$mensajes = [
			'descripcion.required' => 'El campo <strong>Correo Descripción</strong> es requerido',
			'descripcion.min' => 'El campo <strong>descripción</strong> debe contener minimo :min carecteres',
			'descripcion.max' => 'El campo <strong>descripción</strong> debe contener maximo :max carecteres',
			'metabs.required' => 'El campo <strong>Metas Bf </strong> es requerido',
			'metabs.numeric' => 'El campo <strong>Metas Bf </strong> debe ser numerico',
			'prioridad.required' => 'Debe elegir una prioridad',
			'prioridad.numeric' => 'La prioridad debe ser un valor numérico',
			'prioridad.max' => 'La prioridad debe ser un valor numérico de máximo '.Input::all()['maxP'],
			'fecha_limite.required' => 'El campo <strong>Fecha Limite </strong> es requerido',
		
		];

		$validator = Validator::make($datos, $rules, $mensajes );

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$datos['fecha_limite'] = Datemanager::date2db($datos['fecha_limite']);
		$meta->update($datos);
		Session::flash('message','Actualizado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/miembros/metas/'.$meta->miembro->id);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$meta = Meta::find($id);
		if(Meta::destroy($id))
		{
			Session::flash('message','Eliminado Correctamente');
			Session::flash('class','success');
			
		}
		else
		{
			Session::flash('message','Error Al Eliminar');
			Session::flash('class','danger');
			
		}
		
		return Redirect::to('/dashboard/miembros/metas/'.$meta->miembro->id);
	}

}