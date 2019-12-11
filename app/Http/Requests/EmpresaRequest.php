<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
		return [
			'razaosocial'   => 'required|min:5|max:50',
			'nomefantasia'  => 'required|min:5|max:50',
			'cnpj'        	=> 'required|min:18|max:18',
			'email'         => 'required|email:rfc,filter',
			'status'        => 'required',
		];
	}
	
	public function messages()
	{
		return [
			'razaosocial.required'  => 'O campo Razão Social é obrigatório!',
			'razaosocial.min'       => 'O campo Razão Social deve conter ao menos 5 caracteres!',
			'razaosocial.max'       => 'O campo Razão Social deve conter no máximo 50 caracteres!',
			'nomefantasia.required' => 'O campo Nome Fantasia é obrigatório!',
			'nomefantasia.min'      => 'O campo Nome Fantasia deve conter ao menos 5 caracteres!',
			'nomefantasia.max'      => 'O campo Nome Fantasia deve conter no máximo 50 caracteres!',
			'cnpj.required'         => 'O campo CNPJ é obrigatório!',
			'cnpj.min'              => 'O campo CNPJ Endereço conter ao menos 18 caracteres!',
			'cnpj.max'              => 'O campo CNPJ Endereço conter no máximo 18 caracteres!',
			'email.required'        => 'O campo Email é obrigatório!',
			'email.required'        => 'O campo Status é obrigatório!',
		];
	}
}
