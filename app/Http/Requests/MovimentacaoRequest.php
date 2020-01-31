<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentacaoRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			// 'tipo'            		=> 'required',
      'contato_id'       		  => 'required',
      'condicao_pagamento_id' => 'required',
      'centrocusto_id'				=> 'required',
      'observacao'          	=> 'max:255',
      'valortotal'     				=> 'required',
			'valorrecebido'     		=> 'required',
		];
	}

	public function messages()
  {
    return [
      // 'tipo.required'               	 => 'O campo Tipo de movimentação é obrigatório!',
      'contato_id.required'            => 'Deve-se informar um CONTATO!',
      'centrocusto_id.required'        => 'Deve-se informar um CENTRO DE CUSTO!',
      'condicao_pagamento_id.required' => 'Deve-se informar uma CONDIÇÃO DE PAGAMENTO!',
      'observacao.required'            => 'A OBSERVAÇÃO pode conter até 255 caracteres!',
      'valortotal.required'            => 'Informe O VALOR TOTAL da movimentação!',
    ];
  }
}
