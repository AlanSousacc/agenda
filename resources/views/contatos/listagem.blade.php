@extends('layouts.master-admin')

@section('master')
<div class="wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listagem de Contatos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Listagem de contatos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Dados dos contatos cadastrados</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="example1_length">
                    <label>Mostrar <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> Registros</label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" class="dataTables_filter">
                    <label>Consultar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome: activate to sort column descending" style="width: 383px;">Nome</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Documento: activate to sort column ascending" style="width: 200px;">Documento</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Endereco: activate to sort column ascending" style="width: 200px;">Endereco</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Telefone: activate to sort column ascending" style="width: 200px;">Telefone</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 200px;">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data Nascimento: activate to sort column ascending" style="width: 200px;">Data Nascimento</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tipo Contato: activate to sort column ascending" style="width: 150px;">Tipo Contato</th>
                        <th class="sorting" rowspan="1" colspan="1" style="width: 150px;">Operação</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($contato as $item)
                      <td class="sorting_1">{{$item->nome}}</td>
                      <td>{{$item->documento}}</td>
                      <td>{{$item->endereco}}</td>
                      <td>{{$item->telefone}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->datanascimento}}</td>
                      <td>{{$item->tipocontato}}</td>
                      <td>
                        teste
                      </td>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      <li class="paginate_button page-item previous disabled" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                      </li>
                      <li class="paginate_button page-item active">
                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                      </li>
                      {{-- teste --}}
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                      </li>
                      <li class="paginate_button page-item next" id="example1_next">
                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
  jQuery(function () {
    jQuery('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

</script>
@endsection
