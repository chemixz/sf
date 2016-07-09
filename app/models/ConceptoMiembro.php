<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class ConceptoMiembro extends Eloquent {

	 protected $table = 'concepto_miembro';
	 protected $fillable =['monto','descripcion','estatus','miembro_id','concepto_id'];
	 protected $guarded = ['id'];

	 public static $rules = [
	 	'monto' => 'required|numeric|',
	 	'descripcion' => 'required|min:5',
	 	'concepto_id' => 'required',
	 	

	 ];

	 public static $mensaje = [

	  'concepto_id.required' => 'EL campo  <strong>Concepto </strong> esta vacio'

	 ];



	 public static function validator($data)
	 {
	 	return Validator::make($data, static::$rules, static::$mensaje);
	 }

	 // public static function validacioneslogin($data)
	 // {
	 // 	return Validator::make($data, static::$reglaslogin, static::$mensajeslogin);
	 // }

	 public function concepto()
	 {
	 	return $this->belongsTo('Concepto');
	 }
	 public function miembro()
	 {
	 	return $this->belongsTo('Miembro');
	 }


	
	

	// Don't forget to fill this array
	//protected $fillable = [];

}
