<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
{
	/**
	* Determine if the user is authorized to make this request.
	*
	* @return bool
	*/
	public function authorize()
	{
		return true;
	}

	/**
	* Get the validation rules that apply to the request.
	*
	* @return array
	*/
	public function rules()
	{
		$rules = [
			'descricao' => 'required|min:5|max:150',
    ];


    return $rules;
	}

	public function messages()
	{
		return [
			'descricao.required'  => 'O campo Descrição é obrigatório!',
			'descricao.min'       => 'O campo Descrição deve conter ao menos 5 caracteres!',
			'descricao.max'       => 'O campo Descrição deve conter no máximo 50 caracteres!',
		];
	}
}
