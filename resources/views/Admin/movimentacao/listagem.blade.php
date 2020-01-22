@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<div class="col-md-12">
  <div class="col-12 col-sm-6 col-lg-12">
    <div class="card card-primary card-outline card-outline-tabs" style="border-top: 0px solid #007bff;">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-three-entradas-tab" data-toggle="pill" href="#custom-tabs-three-entradas" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Entradas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-saidas-tab" data-toggle="pill" href="#custom-tabs-three-saidas" role="tab" aria-controls="custom-tabs-three-saidas" aria-selected="false">Saídas</a>
          </li>
        </ul>
      </div>
      <div class="tab-content" id="custom-tabs-three-tabContent">
        {{-- capos entradas --}}
        <div class="tab-pane fade show active" id="custom-tabs-three-entradas" role="tabpanel" aria-labelledby="custom-tabs-three-entradas-tab">
          <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" >Contato</th>
                <th class="text-center" >Cond. Pag.</th>
                <th class="text-center" >Dt Movimentação</th>
                <th class="text-center" >Valor Total</th>
                <th class="text-center" >Valor Recebido</th>
                <th class="text-center" >Valor débito</th>
                <th class="text-center" >Opções</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($movIn as $item)
              <tr role="row" class="odd">
                <td class="text-center">{{$item->contato->nome}}</td>
                <td class="text-center">{{$item->condicao_pagamento->nome}}</td>
                <td class="text-center">{{($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
                <td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
                <td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
                <td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
                <td class="text-center" style="padding: 0.45rem">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Ação
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{$item->id}}"
                        data-movid="{{$item->id}}"
                        data-tipo="{{$item->tipo}}"
                        data-contato_id="{{$item->contato->id}}"
                        data-centrocusto_id="{{$item->centrocusto->id}}"
                        data-user_id="{{$item->user->name}}"
                        data-condicao_pagamento_id="{{$item->condicao_pagamento->id}}"
                        data-observacao="{{$item->observacao}}"
                        data-valortotal="{{$item->valortotal}}"
                        data-valorrecebido="{{$item->valorrecebido}}"
                        data-valorpendente="{{$item->valorpendente}}"
                        data-movimented_at="{{$item->movimented_at->format('d/m/Y H:m')}}"
                        data-status="{{$item->status == 0 ? 'Aberto' : 'Completo'}}"
                        data-target="#visualizar"
                        data-toggle="modal"> Visualizar <i class="fab fa-wpforms"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
                        <div class="dropdown-divider"></div>
                        @if ($item->status == 0)
													<a class="dropdown-item" href="{{$item->id}}"
														data-movid={{$item->id}}
														data-valortotal="{{$item->valortotal}}"
														data-valorrecebido="{{$item->valorrecebido}}"
														data-valorpendente="{{$item->valorpendente}}"
														data-target="#fecharconta"
														data-toggle="modal">Receber <i class="fa fa-money-bill-alt"></i></a>
                        @else
                          <p class="text-center">-</p>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td class="text-center" colspan="3"></td>
                  <td class="text-center" style="font-weight:600">Total R$ {{number_format($totalIn, 2, ',', '.')}}</td>
                  <td class="text-center" style="font-weight:600">Total Rec. R$ {{number_format($totalRecebIn, 2, ',', '.')}}</td>
                  <td class="text-center" style="font-weight:600">Total Pend. R$ {{number_format($totalPendIn, 2, ',', '.')}}</td>
                  <td class="text-center" colspan="1"></td>
                </tr>
              </tfoot>
            </table>
            <div class="row">
              <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$movIn->count()}} movimentações de um total de {{$movIn->total()}}</p></div>
              @if (isset($contato))
              @else
              <div class="col-md-6 pr-4">{{$movIn->links()}}</div>
              @endif
            </div>
          </div>
          {{-- fim campos entradas --}}

          {{-- campos saidas --}}
          <div class="tab-pane fade" id="custom-tabs-three-saidas" role="tabpanel" aria-labelledby="custom-tabs-three-saidas-tab">
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Contato</th>
                  <th class="text-center">Cond. Pag.</th>
                  <th class="text-center">Dt Movimentação</th>
                  <th class="text-center">Valor Total</th>
                  <th class="text-center">Valor Pago</th>
                  <th class="text-center">Valor Restante</th>
                  <th class="text-center">Opções</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($movOut as $item)
                <tr role="row" class="odd">
                  <td class="text-center">{{$item->contato->nome}}</td>
                  <td class="text-center">{{$item->condicao_pagamento->nome}}</td>
                  <td class="text-center">{{($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
                  <td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
                  <td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
                  <td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
                  <td class="text-center" style="padding: 0.45rem">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ação
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{$item->id}}"
													data-movid="{{$item->id}}"
													data-tipo="{{$item->tipo}}"
													data-contato_id="{{$item->contato->id}}"
													data-centrocusto_id="{{$item->centrocusto->id}}"
													data-user_id="{{$item->user->name}}"
													data-condicao_pagamento_id="{{$item->condicao_pagamento->id}}"
													data-observacao="{{$item->observacao}}"
													data-valortotal="{{$item->valortotal}}"
													data-valorrecebido="{{$item->valorrecebido}}"
													data-valorpendente="{{$item->valorpendente}}"
													data-movimented_at="{{$item->movimented_at->format('d/m/Y H:m')}}"
													data-status="{{$item->status == 0 ? 'Aberto' : 'Completo'}}"
													data-target="#visualizar"
													data-toggle="modal"> Visualizar <i class="fab fa-wpforms"></i></a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
													<div class="dropdown-divider"></div>
													@if ($item->status == 0)
														<a class="dropdown-item" href="{{$item->id}}"
															data-movid={{$item->id}}
															data-valortotal="{{$item->valortotal}}"
															data-valorrecebido="{{$item->valorrecebido}}"
															data-valorpendente="{{$item->valorpendente}}"
															data-target="#fecharconta"
															data-toggle="modal">Receber <i class="fa fa-money-bill-alt"></i></a>
													@else
														<p class="text-center">-</p>
													@endif
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center" colspan="3"></td>
                    <td class="text-center" style="font-weight:600">Total R$ {{number_format($totalOut, 2, ',', '.')}}</td>
                    <td class="text-center" style="font-weight:600">Total Pag. R$ {{number_format($totalPagbOut, 2, ',', '.')}}</td>
                    <td class="text-center" style="font-weight:600">Total Pend. R$ {{number_format($totalPendOut, 2, ',', '.')}}</td>
                    <td class="text-center" colspan="1"></td>
                  </tr>
                </tfoot>
              </table>
              <div class="row">
                <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$movOut->count()}} movimentações de um total de {{$movOut->total()}}</p></div>
                @if (isset($contato))
                @else
                <div class="col-md-6 pr-4">{{$movOut->links()}}</div>
                @endif
              </div>
            </div>
          </div>
          {{-- fim campos saidas --}}
        </div>
      </div>
      <!-- Modal editar-->
      @include('Admin.movimentacao.modalVisualizar')

      {{-- modal Deletar--}}
      @include('Admin.movimentacao.modalExcluir')

      {{-- modal Deletar--}}
      @include('Admin.movimentacao.modalFecharConta')

      <div class="row" >
        <div class="col-md-12 mb-3">
          <a href="{{route('movimentacao.createOut')}}" class="btn btn-danger btn-lg float-right mr-2">Nova Saída</a>
          <a href="{{route('movimentacao.createIn')}}" class="btn btn-success btn-lg float-right mr-3">Nova Entrada</a>
        </div>
      </div>
    </div>
    <!-- /.card -->
    @push('scripts')
		<script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
    <script>
      $(document).ready(function () {
        $('#valortotal').mask('000.000.000.000.000,00');
        $('#valorrecebido').mask('000.000.000.000.000,00');
        $('#valorpendente').mask('000.000.000.000.000,00');
      });
    </script>
    @endpush
    @endsection
