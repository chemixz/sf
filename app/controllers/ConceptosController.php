<?php

class ConceptosController extends \BaseController {

	/**
	 * Display a listing of conceptos
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptos = Concepto::all();

		return View::make('back.Conceptos.index', compact('conceptos'));
	}

	/**
	 * Show the form for creating a new concepto
	 *
	 * @return Response
	 */
	
	public function create()
	{
		
		return View::make('back.Conceptos.create');
	}

	/**
	 * Store a newly created concepto in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Concepto::Validator(Input::all());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Concepto::create(Input::all());
		Session::flash('message','Guardado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/conceptos');
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
		$concepto = Concepto::find($id);

		return View::make('back.Conceptos.edit', compact('concepto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$concepto = Concepto::findOrFail($id);

		$validator =Concepto::validator(Input::all());
	

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$concepto->update(Input::all());
		Session::flash('message','Actualizado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/conceptos');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		if(Concepto::destroy($id))
		{
			Session::flash('message','Eliminado Correctamente');
			Session::flash('class','success');
			
		}
		else
		{
			Session::flash('message','Error Al Eliminar');
			Session::flash('class','danger');
			
		}
		
		return Redirect::to('/dashboard/conceptos');
	}

}