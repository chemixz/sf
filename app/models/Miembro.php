<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class Miembro extends Eloquent {

	 protected $table = 'miembros';
	 protected $fillable =['nombre','apellido','email','telf','parentesco','foto','estatus','familia_id'];
	 protected $guarded = ['id'];

	 public static $rules = [
	 	'nombre' => 'required|min:5|max:100',
	 	'apellido' => 'required|min:5|max:100',
	 	'email'  => 'required|email|min:6|max:40',
	 	'telf'  => 'required|numeric',
	 	'foto'	=> 'required|mimes:jpg,jpeg,png'
	 ];

	 public static $rulesUpdate = [
	 	'nombre' => 'required|min:5|max:100',
	 	'apellido' => 'required|min:5|max:100',
	 	'email'  => 'required|email|min:6|max:40',
	 	'telf'  => 'required|numeric',
	 	'foto'	=> 'mimes:jpg,jpeg,png'
	 ];

	 public static function validator($data)
	 {
	 	return Validator::make($data, static::$rules);
	 }
	 
	 public static function validatorUpdate($data)
	 {
	 	return Validator::make($data, static::$rulesUpdate);
	 }
	
	 public function familia()
	 {
	 	return $this->belongsTo('Familia');
	 }

	 public function metas()
	 {
	 	return $this->hasMany('Meta');
	 }

	 public function conceptos()
	 {
	 	return $this->BelongsToMany('Concepto')->withPivot('monto','descripcion','estatus')->withTimestamps();
	 }

	  public function conceptosmiembros()
	 {
	 	return $this->HasMany('ConceptoMiembro');
	 }
	


}
