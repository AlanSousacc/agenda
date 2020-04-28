<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
  public function authorize()
  {
    return true;
	}
	
  public function rules()
  {
    return [
      'nome'            => 'required|min:3|max:50',
      'documento'       => 'max:14',
      'endereco'        => 'max:50',
      'numero'          => 'max:5',
      // 'email'           => 'required|email:rfc,filter',
      'status'          => 'required',
      'tipocontato'     => 'required',
      'cidade'          => 'max:20',
      'nomeresponsavel' => 'max:80',
      'cpfresponsavel'  => 'max:14',
      'nomeparente'     => 'max:80',
      'telefoneparente' => 'max:20',
      'observacao'      => 'max:300',
      'sexo'          	=> 'required',
    ];
  }

  public function messages()
  {
    return [
      'nome.required'               => 'O campo Nome é obrigatório!',
      'nome.min'                    => 'O campo Nome deve conter ao menos 3 caracteres!',
      'nome.max'                    => 'O campo Nome deve conter no máximo 50 caracteres!',
      'documento.max'               => 'O campo Documento deve conter no máximo 14 caracteres!',
      'endereco.max'                => 'O campo Nome Endereço conter no máximo 50 caracteres!',
      'numero.max'                  => 'O campo Número deve conter no máximo 5 caracteres!',
      'cidade.max'                  => 'O campo Cidade deve conter no máximo 20 caracteres!',
      // 'email.required'              => 'O campo Email é obrigatório!',
      'status.required'             => 'O campo Status é obrigatório!',
      'sexo.required'               => 'O campo Sexo é obrigatório!',
      'profissao.max'               => 'O campo Profissão deve conter no máximo 50 caracteres!',
      'nomeresponsavel.max'         => 'O campo Nome do Responsável deve conter no máximo 80 caracteres!',
      'cpfresponsavel.max'          => 'O campo CPF do Responsável deve conter no máximo 14 caracteres!',
      'nomeparente.max'             => 'O campo Nome de um Parente deve conter no máximo 30 caracteres!',
      'telefoneparente.max'         => 'O campo Telefone de um parente deve conter no máximo 20 caracteres!',
      'observacao.max'              => 'O campo Observação deve conter no máximo 300 caracteres!',
    ];
  }
}
