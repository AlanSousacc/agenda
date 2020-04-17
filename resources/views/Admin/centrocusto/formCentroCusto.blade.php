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
						<label for="tipo">Tipo*</label>
						<div class="input-group">
							<select class="form-control tipo" id="tipo" name="tipo" {{old('tipo')}}>
								<option value="Receita" @if (isset($centro->tipo) && ($centro->tipo == 'Receita')) selected @endif>Receita</option>
								<option value="Despesa" @if (isset($centro->tipo) && ($centro->tipo == 'Despesa')) selected @endif>Despesa</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-2">
          <div class="form-group">
            <label for="status">Status*</label>
            <div class="input-group">
              <select class="form-control status" id="status" name="status">
                <option value="1" @if (isset($centro->status) && ($centro->status == '1')) selected @endif>Ativo</option>
                <option value="0" @if (isset($centro->status) && ($centro->status == '0')) selected @endif>Inativo</option>
              </select>
            </div>
          </div>
        </div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="descricao">Descrição do Centro de Custo</label>
						<div class="input-group">
							<input type="text" class="form-control descricao" id="descricao" placeholder="Descreva o Centro de Custo" value="{{isset($centro) ? $centro->descricao : ''}}" name="descricao" autofocus minlength="5" maxlength="80">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
