<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoEventoRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $rules = [
      'titulo'   		=> 'required|min:3|max:50',
    ];
    return $rules;
  }

  public function messages()
  {
    return [
      'titulo.required'  => 'O campo Descrição de Evento é obrigatório!',
      'titulo.min'       => 'O campo Descrição de Evento deve conter ao menos 3 caracteres!',
      'titulo.max'       => 'O campo Descrição de Evento deve conter no máximo 50 caracteres!',
    ];
  }
}
