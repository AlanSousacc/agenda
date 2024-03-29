<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'title' 					=> 'required|min:3',
      'start' 					=> 'date_format:Y-m-d H:i:s|before:end',
			'end'   					=> 'date_format:Y-m-d H:i:s|after:start',
			'valorevento'			=> 'required_if:geracobranca,==,1',
    ];
  }

  public function messages()
  {
    return [
      'title.required'    			=> 'O campo Título é Obrigatório!',
      'title.min'         			=> 'O campo Título deve conter ao menos 1 caracter!',
      'start.date_format' 			=> 'Preencha uma data/hora inicial com valor válido!',
      'start.before'      			=> 'A data/hora inicial deve ser inferior a data final!',
      'end.date_format'   			=> 'Preencha uma data/hora final com valor válido!',
			'end.after'         			=> 'A data/hora final deve ser superior a data inicial!',
			'valorevento.required_if'	=> 'Informe um valor de agendamento quando selecionado gerar cobrança!'
    ];
  }
}
