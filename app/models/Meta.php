<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class Meta extends Eloquent {

	 protected $table = 'metas';
	 protected $fillable =['prioridad','descripcion','metabs','fecha_limite','miembro_id'];
	 protected $guarded = ['id'];

	 public static $rules = [
	 	'descripcion' => 'required|min:5|max:100',
	 	'descripcion' => 'required|min:5|max:50',
	 	'metabs' => 'required|min:2|numeric',
	 	'prioridad' => 'required|numeric',
	 	'fecha_limite' => 'required',

	 ];

	 public static $mensajes = [
	 	'descripcion.required' => 'El campo <strong>Correo Descripción</strong> es requerido',
	 	'descripcion.min' => 'El campo <strong>descripción</strong> debe contener minimo :min carecteres',
	 	'descripcion.max' => 'El campo <strong>descripción</strong> debe contener maximo :max carecteres',
	 	'metabs.required' => 'El campo <strong>Metas Bf </strong> es requerido',
	 	'metabs.numeric' => 'El campo <strong>Metas Bf </strong> debe ser numerico',
	 	'prioridad.required' => 'Debe elegir una prioridad',
	 	'prioridad.numeric' => 'La prioridad debe ser un valor numérico',
	 	'fecha_limite.required' => 'El campo <strong>Fecha Limite </strong> es requerido',
	 
	 ];

	 public static function validator($data)
	 {
	 	return Validator::make($data, static::$rules, static::$mensajes );
	 }
	
	 public function miembro()
	 {

	 	return $this->belongsto('Miembro');
	 }


}
