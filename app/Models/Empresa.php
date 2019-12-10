<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $filable = ['razaosocial', 'nomefantasia', 'apelido', 'cnpj', 'ie', 'im', 'telefone', 'email', 'cidade', 'endereco', 'numero', 'cep', 'bairro', 'logo'];
}
