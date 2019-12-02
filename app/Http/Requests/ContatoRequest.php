<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
      'nome'            => 'required|min:3|max:50',
      'documento'       => 'required|min:14|max:14',
      'endereco'        => 'required|min:2|max:50',
      'numero'          => 'required|min:1|max:5',
      'email'           => 'required|email:rfc,filter',
      'datanascimento'  => 'date_format:Y-m-d',
      'tipocontato'     => 'required',
      'status'          => 'required',
      'cidade'          => 'required|min:3|max:20',
    ];
  }

  public function messages()
  {
    return [
      'nome.required'               => 'O campo Nome é obrigatório!',
      'nome.min'                    => 'O campo Nome deve conter ao menos 3 caracteres!',
      'nome.max'                    => 'O campo Nome deve conter no máximo 50 caracteres!',
      'documento.required'          => 'O campo Documento é obrigatório!',
      'documento.min'               => 'O campo Documento deve conter ao menos 14 caracteres!',
      'documento.max'               => 'O campo Documento deve conter no máximo 14 caracteres!',
      'endereco.required'           => 'O campo Endereço é obrigatório!',
      'endereco.min'                => 'O campo Nome Endereço conter ao menos 2 caracteres!',
      'endereco.max'                => 'O campo Nome Endereço conter no máximo 50 caracteres!',
      'numero.required'             => 'O campo Número é obrigatório!',
      'numero.min'                  => 'O campo Número deve conter ao menos 1 caracteres!',
      'numero.max'                  => 'O campo Número deve conter no máximo 5 caracteres!',
      'cidade.required'             => 'O campo Cidade é obrigatório!',
      'cidade.min'                  => 'O campo Cidade deve conter ao menos 3 caracteres!',
      'cidade.max'                  => 'O campo Cidade deve conter no máximo 20 caracteres!',
      'email.required'              => 'O campo Email é obrigatório!',
      'tipocontato.required'        => 'O campo Tipo Contato é obrigatório!',
      'status.required'             => 'O campo Status é obrigatório!',
      'datanascimento.date_format'  => 'Preencha uma data com formáto válido!',
    ];
  }
}
