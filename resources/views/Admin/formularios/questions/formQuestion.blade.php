<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-12 col-sm-6 col-lg-12">
	<div class="card card-primary card-outline card-outline-tabs" style="    border-top: 0px solid #007bff;">
		<div class="card-header p-0 border-bottom-0">
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="status">Status</label>
						<div class="input-group">
							<select disabled class="form-control status" id="status" name="status">
								<option value="1" @if (isset($formulario->status) && ($formulario->status == '1')) selected @endif>Ativo</option>
								<option value="0" @if (isset($formulario->status) && ($formulario->status == '0')) selected @endif>Inativo</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="descricao">Descrição do Formulário</label>
						<div class="input-group">
							<input type="text" disabled class="form-control descricao" id="descricao" placeholder="Nome do Formulário" value="{{isset($formulario) ? $formulario->descricao : ''}}" name="descricao" autofocus minlength="5" maxlength="80">
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="status">Perguntas</label>
						<div class="input-group">
							
							
							{{-- INÍCIO DO MODAL --}}
							
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#questionModal">
								Adicionar
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="questionModalLabel">{{isset($formulario) ? $formulario->descricao : ''}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="{{route('formquestion.store')}}" method="POST">
											{{ csrf_field() }}
											<div class="modal-body">
												<div class="form-group">
													<input type="text" hidden class="form-control formid" id="formulario_id" value="{{isset($formulario) ? $formulario->id : ''}}" name="formulario_id" >
													<input type="text" hidden class="form-control formdescricao" id="descricao" value="{{isset($formulario) ? $formulario->descricao : ''}}" name="descricao">
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlInput1">Digite a Pergunta</label>
													<input type="text" class="form-control question" id="question" placeholder="Digite a Pergunta" value="" name="question" autofocus minlength="5" maxlength="30">
												</div>
												
												
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												<button type="submit" class="btn btn-primary">Salvar</button>
											</div>
										</form>
										
									</div>
								</div>
							</div>
							{{-- FIM DO MODAL --}}
							
						</div>
					</div>
				</div>	
			</div>
		</div>		
	</div>
</div>
{{-- <br> --}}
<div class="col-12 col-sm-6 col-lg-12">
	<div class="card card-primary card-outline card-outline-tabs" style="    border-top: 0px solid #007bff;">
		<div class="card-header p-0 border-bottom-0">
		</div>
		<div class="card-body">
			<div class="row">
				<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 20px;" >#ID</th>
								<th class="th-sm" style="width: 250px;" >Pergunta</th>
								<th class="text-center th-sm" style="width: 100px;" >Criado em</th>
								<th class="text-center th-sm" style="width: 100px;" >Atualizado em</th>
								<th class="text-center th-sm" style="width: 50px;" >Status</th>
								<th class="text-center th-sm" style="width: 50px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($question as $quest)
							<tr role="row" class="odd">
								<td class="text-center">{{$quest->id}}</td>
								<td>{{$quest->question}}</td>
								<td class="text-center">{{ date('d/m/Y H:m', strtotime($quest->created_at)) }}</td>
								<td class="text-center">{{ date('d/m/Y H:m', strtotime($quest->updated_at)) }}</td>
								<td class="text-center">
									@if ( $quest->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										{{-- <a class="btn btn-outline-secondary btn-sm btn-block" href="{{ route('form.edit', $form->id) }}"><i class="fa fa-edit"></i> Editar</a> --}}
								 </div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>	
