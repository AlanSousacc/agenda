@extends('layouts.master-admin')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('master')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="com-md-6">
        <h3 class="card-title mt-md-2"> Listagem de Contatos</h3>
      </div>

      <div class="com-md-6 float-md-right search">
        <form action="{{route('routeContatoSearch')}}" method="POST" class="form-inline">
          @csrf
          <div class="input-group input-group-sm">
            <input type="search" placeholder="Consultar" aria-label="Consultar" name="nome" class="form-control form-control-navbar">
            <div class="input-group-append">
              <button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px;" >#ID</th>
          <th class="th-sm" style="width: 200px;" >Nome Completo</th>
          <th class="th-sm" style="width: 150px;" >Documento</th>
          <th class="th-sm" style="width: 200px;" >Endereço</th>
          <th class="th-sm" style="width: 150px;" >Cidade</th>
          <th class="th-sm" style="width: 100px;" >Telefone</th>
          <th class="th-sm" style="width: 161px;" >Email</th>
          <th class="th-sm" style="width: 120px;" >Nascimento</th>
          {{-- <th class="th-sm" style="width: 120px;" >Tipo de Contato</th> --}}
          <th class="text-center" style="width: 120px;" >Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->id}}</td>
          <td class="sorting_1">{{$item->nome}}</td>
          <td>{{$item->documento}}</td>
          <td>{{$item->endereco}}</td>
          <td>{{$item->cidade}}</td>
          <td>{{$item->telefone}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->datanascimento}}</td>
          {{-- <td>{{$item->tipocontato}}</td> --}}
          <td class="text-center" style="padding: 0.45rem">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ação
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="http://"> Editar <i class="fa fa-edit"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://"> Excluir <i class="fa fa-trash"></i></a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} usuários de um total de {{$consulta->total()}}</p></div>
      @if (isset($contato))
      <div class="col-md-6 pr-4">{{$consulta->appends($contato)->links()}}</div>
      @else
      <div class="col-md-6 pr-4">{{$consulta->links()}}</div>
      @endif
    </div>

  </div>
</div>
<!-- /.card -->
@endsection


