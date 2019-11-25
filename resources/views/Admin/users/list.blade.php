@extends('layouts.master-admin')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('master')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listagem de Usuários</h3>
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">#ID
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
              <th class="th-sm">Opções
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
            <tr role="row" class="odd">
              <td class="sorting_1">{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>{{$item->profile}}</td>
              <td>
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
      </div>
</div>
<!-- /.card -->
@section('js')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
@endsection
@endsection


