<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "El campo :attribute debe ser aceptado.",
	"active_url"       => "El campo :attribute no es una dirección URL válida.",
	"after"            => "El campo :attribute debe ser una fecha después de :date.",
	"alpha"            => "El campo :attribute puede contener solo letra.",
	"alpha_dash"       => "El campo :attribute debe contener solo letras,número y guiones .",
	"alpha_num"        => "El campo :attribute debe contener solo letras y números.",
	"array"            => "El campo :attribute debe ser un arreglo.",
	"before"           => "El campo :attribute debe ser una fecha antes de :date.",
	"between"          => array(
		"numeric" => "El campo :attribute debe estar entre :min y :max.",
		"file"    => "El campo :attribute debe estar entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe tener entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max items.",
	),
	"confirmed"        => "El campo :attribute de confirmacion no concuerda.",
	"date"             => "El campo :attribute no es una fecha válida.",
	"date_format"      => "El formato del campo :attribute  no concuerda con  :format.",
	"different"        => "El campo :attribute y :other deben ser difrentes.",
	"digits"           => "El campo :attribute debe contener :digits digitos.",
	"digits_between"   => "El campo :attribute debe contener entre :min y :max digitos.",
	"email"            => "El formato del campo :attribute no es válido.",
	"exists"           => "El campo :attribute seleccionado no es válido.",
	"image"            => "El campo :attribute debe ser una imagen.",
	"in"               => "El campo :attribute  seleccionado no es válido.",
	"integer"          => "El campo :attribute debe ser un entero.",
	"ip"               => "El campo :attribute debe ser una dirección IP valida.",
	"max"              => array(
		"numeric" => "El campo :attribute no debe ser mayor que :max.",
		"file"    => "El campo :attribute no debe ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no debe ser mayor que :max caracteres.",
		"array"   => "El campo :attribute no debe tener más de :max items.",
	),
	"mimes"            => "El campo :attribute debe ser un archivo de tipo: :values.",
	"min"              => array(
		"numeric" => "El campo :attribute debe ser de almenos :min.",
		"file"    => "El campo :attribute debe ser de almenos :min kilobytes.",
		"string"  => "El campo :attribute debe ser de almenos :min caracteres.",
		"array"   => "El campo :attribute no debe tener más de :min items.",
	),
	"not_in"           => "El campo :attribute seleccionado no es válido.",
	"numeric"          => "El campo :attribute debe ser un número.",
	"regex"            => "El formato del campo :attribute no es valido.",
	"required"         => "El campo :attribute es requerido.",
	"required_if"      => "El campo :attribute es requerido cuando :other  es :value.",
	"required_with"    => "El campo :attribute es requerido cuando :values está presente.",
	"required_without" => "El campo :attribute es requerido cuando :values no está presente.",
	"same"             => "El campo :attribute y  el campo :other deben ser iguales.",
	"size"             => array(
		"numeric" => "El campo :attribute debe ser de :size.",
		"file"    => "El campo :attribute debe ser de :size kilobytes.",
		"string"  => "El campo :attribute debe ser de :size caracteres.",
		"array"   => "El campo :attribute debe contener :size items.",
	),
	"unique"           => "El campo :attribute ya ha sido registrado.",
	"url"              => "El formato del campo :attribute no es válido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
