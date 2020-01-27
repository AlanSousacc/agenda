@extends('layouts.master-admin')
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<table id="dtBasicExample" class="table table-striped table-bordered table-md" width="100%">
  <thead>
    <tr>
      <th class="text-center">Cond Pag.</th>
      <th class="text-center">Tipo</th>
      <th class="text-center">Dt. de Movi.</th>
      <th class="text-center">Valor Total</th>
      <th class="text-center">Valor Pago</th>
      <th class="text-center">Valor Deb.</th>
      <th class="text-center">Status</th>
      <th class="text-center" >Opções</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($consulta as $item)
    <tr role="row" class="odd">
      <td class="text-center">{{$item->condicao_pagamento->nome}}</td>
      <td class="text-center">
        @if ($item->tipo == 'Entrada')
          <i class="fa fa-arrow-alt-circle-up text-success"></i>
        @else
          <i class="fa fa-arrow-alt-circle-down text-danger"></i>
        @endif
      </td>
      <td class="text-center">{{$item->movimented_at->format('d/m/Y')}}</td>
      <td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
      <td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
      <td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
      @if ($item->status == 0)
        <td class="text-center text-danger"><i class="fa fa-times-circle"></i></td>
      @else
        <td class="text-center text-success"><i class="fa fa-check-circle"></i></td>
      @endif
      <td class="text-center" style="padding: 0.45rem">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ação
          </button>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{$item->id}}"
              data-tipo="{{$item->tipo}}"
              data-contato_id="{{$item->contato->id}}"
              data-user_id="{{$item->user->name}}"
              data-centrocusto_id="{{$item->centrocusto->id}}"
              data-condicao_pagamento_id="{{$item->condicao_pagamento->id}}"
              data-observacao="{{$item->observacao}}"
              data-valortotal="{{$item->valortotal}}"
              data-valorrecebido="{{$item->valorrecebido}}"
              data-valorpendente="{{$item->valorpendente}}"
              data-movimented_at="{{$item->movimented_at->format('d/m/Y')}}"
              data-status="{{$item->status == 0 ? 'Aberto' : 'Completo'}}"
              data-target="#visualizar"
              data-toggle="modal"> Visualizar <i class="fab fa-wpforms"></i></a>
            <div class="dropdown-divider"></div>
            @if ($item->status == 0)
              <a class="dropdown-item" href="{{$item->id}}"
                data-movid={{$item->id}}
                data-tipo="{{$item->tipo == 'Entrada' ? 'receber' : 'pagar' }}"
                data-valortotal="{{$item->valortotal}}"
                data-valorrecebido="{{$item->valorrecebido}}"
                data-valorpendente="{{$item->valorpendente}}"
                data-target="#fecharconta"
                data-toggle="modal">
                @if ($item->tipo == 'Entrada')
                  Receber <i class="fa fa-money-bill-alt"></i>
                @else
                  Pagar <i class="fa fa-money-bill-alt"></i>
                @endif
              </a>
            @else
              <p class="text-center">-</p>
            @endif
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-3 float-right">
      <h5 class="text-right"><i class="fa fa-arrow-alt-circle-down text-danger"></i> Débito Total: <strong> R$ {{number_format($totaldeb, 2, ',', '.')}}<strong></h5>
    </div>
    <div class="col-md-3 offset-md-6 float-right">
      <h5 class="text-right"><i class="fa fa-arrow-alt-circle-up text-success"></i> Valor Pago: <strong> R$ {{number_format($total, 2, ',', '.')}}<strong></h5>
    </div>
  </div>
</div>
