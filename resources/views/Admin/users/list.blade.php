@extends('layouts.master-admin')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('master')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="com-md-6"><h3 class="card-title mt-md-2">Listagem de Usuários</h3></div>
      <div class="com-md-6 float-lg-right">
        <form action="{{route('routeUserSearch')}}" method="POST" class="form form-inline">
          @csrf
          <input type="text" placeholder="Consultar Contato" name="name" class="form form-control mx-md-2">
          <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Consultar</button>
        </form>
      </div>
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="text-center">#ID
          </th>
          <th class="th-sm">Nome Completo
          </th>
          <th class="th-sm">Email
          </th>
          <th class="th-sm">Data de Criação
          </th>
          <th class="th-sm">Ultima Atualização
          </th>
          <th class="th-sm">Perfil
          </th>
          <th class="text-center">Opções
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $item)
        <tr role="row" class="odd">
          <td class="text-center">{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>{{$item->profile}}</td>
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
      <div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$user->count()}} usuários de um total de {{$user->total()}}</p></div>
      @if (isset($dataform))
        <div class="col-md-6 pr-4">{{$user->appends($dataform)->links()}}</div>
      @else
        <div class="col-md-6 pr-4">{{$user->links()}}</div>
      @endif
    </div>

  </div>
</div>
<!-- /.card -->
@endsection


