<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class Familia extends Eloquent {

	 protected $table = 'familias';
	 protected $fillable =['nombre','dirección','telf','estatus','usuario_id','foto'];
	 protected $guarded = ['id'];

	 public static $rules = [
	 	'nombre' => 'required|min:5|max:100',
	 	'dirección'  => 'required',
	 	'telf'  => 'required|numeric',
	 	'foto'  => 'mimes:jpg,jpeg,png'
	 ];

	 public static function validator($data)
	 {
	 	return Validator::make($data, static::$rules);
	 }


	 public function usuario()
	 {
	 	return $this->belongsTo('Usuario');
	 }	
	 public function miembro()
	 {
	 	return $this->hasMany('Miembro');
	 }
}
