<?php

class ConceptosMiembrosController extends \BaseController {

	/**
	 * Display a listing of conceptos
	 *
	 * @return Response
	 */
	public function index($id)
	{

		$datos = [
				'conceptomiembro'=> ConceptoMiembro::where('miembro_id','=',$id)->get(),
				'miembro'=>Miembro::find($id),
		];


		return View::make('back.ConceptosMiembros.index')->with($datos);
	}

	/**
	 * Show the form for creating a new concepto
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$datos=[
			
			'conceptos' => Concepto::all(),
			'miembro' => Miembro::find($id),
		];

		return View::make('back.ConceptosMiembros.create')->with($datos);
	}

	/**
	 * Store a newly created concepto in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$validator = ConceptoMiembro::Validator(Input::all());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$datos= input::all();

		$datos['monto']=(float)$datos['monto'];

		ConceptoMiembro::create($datos);
		Session::flash('message','Guardado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/conceptosmiembros/'.$id);
	}

	/**
	 * Display the specified concepto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$concepto = Concepto::findOrFail($id);

		return View::make('back.Conceptos.show', compact('concepto'));
	}

	/**
	 * Show the form for editing the specified concepto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$datos = [
				'conceptomiembro'=> ConceptoMiembro::find($id),
				'conceptos' => Concepto::get(array('id','nombre')),
		];

		return View::make('back.ConceptosMiembros.edit')->with($datos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$conceptomiembro = ConceptoMiembro::findOrFail($id);

		$validator =ConceptoMiembro::validator(Input::all());	

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$datos= input::all();
		$datos['monto']=(float)$datos['monto'];
		
		$conceptomiembro->update($datos);
		Session::flash('message','Actualizado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/conceptosmiembros/'.$conceptomiembro->miembro->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$conceptomiembro= ConceptoMiembro::find($id);
		
		if(ConceptoMiembro::destroy($id))
		{
			Session::flash('message','Eliminado Correctamente');
			Session::flash('class','success');
			
		}
		else
		{
			Session::flash('message','Error Al Eliminar');
			Session::flash('class','danger');
			
		}
		
		return Redirect::to('/dashboard/conceptosmiembros/'.$conceptomiembro->miembro->id);
	}

}