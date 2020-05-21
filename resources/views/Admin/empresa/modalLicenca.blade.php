<div class="modal fade" id="licenca" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:600px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gerar Licença da Empresa</h4>
      </div>
      <form action="{{route('licenca.store')}}" method="post">
				{{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="empresa_id" id="emprid" value="">
					@include('Admin.licenca.formLicenca')
					<input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <div class="modal-footer">
					<div class="left" style="width: 50%;">
						<button type="submit" class="btn btn-warning generate">Gerar Código</button>
					</div>
					<div class="right" style="width: 50%">
						<button type="submit" class="btn btn-primary float-right salvar">Salvar Licença</button>
						<button type="button" class="btn btn-default float-right mx-2" data-dismiss="modal">Cancelar</button>
					</div>
        </div>
      </form>
    </div>
  </div>
</div>
