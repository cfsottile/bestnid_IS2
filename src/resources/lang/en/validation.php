<?php

return [

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

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	],
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	],
	"string"               => "The :attribute must be a string.",
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

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

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
		'name' => [
			'min' => 'El nombre debe tener al menos :min carácteres',
			'required' => 'El nombre es requerido',
			'max' => 'El nombre debe tener hasta :max carácteres',
			'regex' => 'El nombre no tiene un formato válido',
		],
		'last_name' => [
			'min' => 'El apellido debe tener al menos :min carácteres',
			'required' => 'El apellido es requerido',
			'max' => 'El apellido debe tener hasta :max carácteres',
			'regex' => 'El apellido no tiene un formato válido',
		],
		'email' => [
			'required' => 'La dirección email es requerida',
			'max' => 'La dirección email debe tener hasta :max carácteres',
			'email' => 'La dirección email debe ser una dirección válida.',
			'unique' => 'La dirección email ya ha sido usada'
		],
		'password' => [
			'required' => 'La contraseña es requerida',
			'max' => 'La contraseña debe tener hasta :max carácteres',
			'min' => 'La contraseña debe tener al menos :min carácteres',
			'confirmed' => 'Es necesario que las dos contraseñas coincidan',
		],
		'dni' => [
			'required' => 'El DNI es requerido',
			'regex' => 'El DNI tiene no tiene un formato válido',
			'min' => 'El DNI debe tener al menos :min números',
			'max' => 'El DNI debe tener hasta :max números',
		],
		'born_date' => [
			'required' => 'La fecha de nacimiento es requerida',
			'date' => 'No es un formato válido de fecha',
		],
		'phone' => [
			'required' => 'El telefono es requerido',
			'min' => 'El telefono debe tener al menos :min números',
			'max' => 'El telefono debe tener hasta :max números',
			'regex' => 'El teléfono no tiene un formato válido'
		],
		'cc_data' => [
			'required' => 'La tarjeta es requerida',
			'regex' => 'El número de tarjeta no tiene un formato válido',
			'min' => 'El número de tarjeta debe tener 16 números',
			'max' => 'El número de tarjeta debe tener 16 números'
		],
		'accept_terms' => [
			'accepted' => 'Es necesario aceptar los términos y condiciones',
		],

		'title' => [
			'required' => 'El título es requerido',
			'max' => 'El título debe tener como máximo :max caracteres',
			'min' => 'El título debe tener como mínimo :min caracteres',
		],
		'description' => [
			'required' => 'La desripción es requerida',
		],
		'categoryName' => [
			'required' => 'Debe ingresar alguna categoría',
			'exists' => 'Hubo un problema con la categoría. Contacte a la administración.'
		],
		'durationInDays' => [
			'required' => 'La duración de la subasta es requerida',
			'between' => 'La duración debe ser de entre :min y :max días inclusive'
		],
		'image' => [
			'required' => 'La imagen es requerida',
			'image' => 'La imagen debe ser un archivo de tipo imagen',
			'mimes' => 'Los tipos de archivos soportados son jpg, jpeg y png',
			'max' => 'El tamaño de la imagen no puede ser superior a :max bytes'
		],

		'picture' => [
			'required' => 'La foto es requerida',
			'min:4' => 'El nombre de la imagen es inválido. Contacte a la administración.'
		],
		'owner_id' => [
			'required' => 'Debe estar registrado para crear subastas',
			'exists' => 'Hubo un error con su usuario. Contacte a la administración.',
		],

	],

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

	'attributes' => [],

];
