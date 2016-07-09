<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class Concepto extends Eloquent {

	 protected $table = 'conceptos';
	 protected $fillable =['nombre','descripcion','tipo','estatus'];
	 protected $guarded = ['id'];

	 public static $rules = [
	 	'nombre' => 'required|min:3|max:100',

	 	'tipo' => 'required|min:2|max:50',

	 	

	 ];






	 public static function validator($data)
	 {
	 	return Validator::make($data, static::$rules);
	 }


	 // public static function validacioneslogin($data)
	 // {
	 // 	return Validator::make($data, static::$reglaslogin, static::$mensajeslogin);
	 // }


	
	 public function miembros()
	 {
	 	return $this->BelongsToMany('Miembro');
	 }
	

	// Don't forget to fill this array
	//protected $fillable = [];

}
