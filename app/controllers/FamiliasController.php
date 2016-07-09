<?php

class FamiliasController extends \BaseController {

	/**
	 * Display a listing of familias
	 *
	 * @return Response
	 */
	public function index()
	{
		$id=Session::get('familia_id');
		// $familias = Familia::Where('usuario_id','=',Session::get('id'))->get();
		$familias=Familia::find($id);
		// Session::put('familia_id',$familias[0]->id);
		
		return View::make('back.Familias.index', compact('familias'));

	}




	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$familia = Familia::findOrFail($id);

		$validator =Familia::validator(Input::all());

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
			
			if($familia->foto!='fam.jpg')
			{
				File::delete($destinationPath.$familia->foto);
			}
			$datos['foto'] = $filename;
			
							
		}
		else
		{
			unset($datos['foto']);
		}
		$familia->update($datos);
		Session::flash('message','Actualizado Correctamente');
		Session::flash('class','success');

		return Redirect::to('/dashboard/familia');
	}

	
}