<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<br>

<div class="col-12 col-sm-6 col-lg-12">
  <div class="card card-primary card-outline card-outline-tabs" style="border-top: 0px solid #007bff;">
    <div class="card-header p-0 border-bottom-0">
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label for="status">Status*</label>
            <div class="input-group">
              <select class="form-control status" id="status" name="status">
                <option value="1" @if (isset($tipoevento->status) && ($tipoevento->status == '1')) selected @endif>Ativo</option>
                <option value="0" @if (isset($tipoevento->status) && ($tipoevento->status == '0')) selected @endif>Inativo</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label for="titulo">Descrição Evento*</label>
            <div class="input-group">
              <input type="text" class="form-control titulo" autocomplete="off" id="titulo" value="{{isset($tipoevento) ? $tipoevento->titulo : ''}}" placeholder="Descreva a Descrição Evento" {{old('titulo')}} name="titulo" required autofocus minlength="3" maxlength="50">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
