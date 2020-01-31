<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentroCustoRequest extends FormRequest
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
			'tipo'   		=> 'required',
			'descricao' => 'required|min:5|max:150',
    ];


    return $rules;
	}

	public function messages()
	{
		return [
			'tipo.required'  => 'O campo Nome é obrigatório! Selecione o tipo de Centro de Custo',
			'descricao.required'  => 'O campo Descrição é obrigatório!',
			'descricao.min'       => 'O campo Descrição deve conter ao menos 5 caracteres!',
			'descricao.max'       => 'O campo Descrição deve conter no máximo 50 caracteres!',
		];
	}
}
