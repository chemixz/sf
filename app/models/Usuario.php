<?php
 //modelo dnd se manda los valores optenidos de homecontrol y se guardan a la bd

// y hacemos las resticciones 
// algunas funciones invokadas del homecotrol
// ejemplo las validacones
class Usuario extends Eloquent {

	 protected $table = 'usuarios';
	 protected $fillable =['nombre','login','email','estatus','rol'];
	 protected $guarded = ['id','clave'];

	 public static $reglasinsertar = [
	 	'nombre' => 'required|min:5|max:100',
	 	'email'  => 'required|email|unique:usuarios,email|min:6|max:40',
	 	'clave'  => 'required|same:cclave|min:6|max:25',
	 	'cclave'  => 'required|same:clave|min:6|max:25',


	 ];

	
//
	 public static $mensajesinsertar = [
	 	'email.required' => 'El campo <strong>Correo electronico</strong> es requerido',
	 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
	 	'email.unique' => 'El <strong>Correo electronico</strong> ya ha sido registrado',
	 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
	 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres',
	 	'clave.required' => 'La <strong>Contrasena </strong> es requerida',
	 	'clave.same' => 'El campo <strong>Contrasena </strong> y el campo <strong>Confirmar Contrasena </strong> deben ser iguales ', 
	 	'clave.min' => 'El campo <strong>Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'clave.max' => 'El campo <strong>Contrasena </strong> debe contener un maximo de :max caracteres ', 
	 	'cclave.required' => 'La <strong>Confirmar Contrasena </strong> es requerida',
	 	'cclave.same' => 'El campo <strong>Confirmar Contrasena </strong> y el campo <strong>Contrasena </strong> deben ser iguales ', 
	 	'cclave.min' => 'El campo <strong>Confirmar Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'cclave.max' => 'El campo <strong>Confirmar Contrasena </strong> debe contener un maximo de :max caracteres '
	 ];


 	public static $reglaslogin=[
	 			'email'  => 'required|min:6|max:40',
	 			'clave'  => 'required|min:6|max:25',

	 ];
	 
	 public static $mensajeslogin = [
	 	'email.required' => 'El campo <strong>Correo electronico</strong> es requerido',
	 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
	 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
	 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres',
	 	'clave.required' => 'La <strong>Contrasena </strong> es requerida',
	 	'clave.min' => 'El campo <strong>Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'clave.max' => 'El campo <strong>Contrasena </strong> debe contener un maximo de :max caracteres ', 

	 ];

	  public static $reglasrenew=[
	 			'email'  => 'required|min:6|max:40',
	 ];
	 public static $mensajesrenew = [
	 	'email.required' => 'El campo <strong>Correo electronico</strong> es requerido',
	 	'email.email' => 'El formato del campo <strong>Correo electronico</strong> no es valido',
	 	'email.min' => 'El campo <strong>Correo electronico</strong> debe contener minimo :min carecteres',
	 	'email.max' => 'El campo <strong>Correo electronico</strong> debe contener maximo :max carecteres',
	 ];


	public static $rulenewpass=[
	 		'aclave'  => 'required|min:6|max:25',
	 		'nclave'  => 'required|same:cclave|min:6|max:25',
	 		'cclave'  => 'required|same:nclave|min:6|max:25',
	 ];

	public static $msjnewpass = [
	 	'aclave.required' => 'La <strong>Actual Contrasena </strong> es requerida',
	 	'aclave.min' => 'El campo <strong>Actual Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'aclave.max' => 'El campo <strong>Actual Contrasena </strong> debe contener un maximo de :max caracteres ', 

	 	'nclave.required' => 'La <strong>Nueva Contrasena </strong> es requerida',
	 	'nclave.min' => 'La <strong>Nueva Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'nclave.max' => 'La <strong>Nueva Contrasena </strong> debe contener un maximo de :max caracteres ', 
	 	'nclave.same' => 'La <strong>Nueva Contrasena </strong> y el campo <strong>Confirmar Contrasena </strong> deben ser iguales ', 

	 	'cclave.required' => 'La <strong>Confirmar Contrasena </strong> es requerida',
	 	'cclave.same' => 'El campo <strong>Confirmar Contrasena </strong> y el campo <strong>Nueva Contrasena </strong> deben ser iguales ', 
	 	'cclave.min' => 'El campo <strong>Confirmar Contrasena </strong> debe contener minimo :min caracteres ', 
	 	'cclave.max' => 'El campo <strong>Confirmar Contrasena </strong> debe contener un maximo de :max caracteres '
	 ];



	 public static function validacionesinsertar($data)
	 {
	 	return Validator::make($data, static::$reglasinsertar, static::$mensajesinsertar);
	 }


	 public static function validacioneslogin($data)
	 {
	 	return Validator::make($data, static::$reglaslogin, static::$mensajeslogin);
	 }
	 
	 public static function validacionesrenew($data)
	 {
	 	return Validator::make($data, static::$reglasrenew, static::$mensajesrenew);
	 }

	  public static function validacionesnewpass($data)
	 {
	 	return Validator::make($data, static::$rulenewpass, static::$msjnewpass);
	 }
	 


	 public function familia()
	 {
	 	return $this->hasOne('Familia');
	 }	
	 // Add your validation rules here
	//public static $rules = [
		// 'title' => 'required'
	//];
	

	// Don't forget to fill this array
	//protected $fillable = [];

}
