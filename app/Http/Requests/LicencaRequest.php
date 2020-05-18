<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicencaRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'hash'   		=> 'required',
		];
	}

	public function messages()
  {
    return [
			'hash.required'			=> 'O campo Código de Ativação é obrigatório.'
    ];
  }
}
