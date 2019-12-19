<form id="formEvent">
  <div id="message"></div>
  <div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label">Título</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" placeholder="Titulo" name="title">
      <input type="hidden" name="id">
    </div>
  </div>
  <div class="form-group row">
    <label for="start" class="col-sm-4 col-form-label">Data/Hora Inicio</label>
    <div class="col-sm-8">
      <input type="text" class="form-control date-time" id="start" placeholder="Data/Hora Inicio" name="start">
    </div>
  </div>
  <div class="form-group row">
    <label for="end" class="col-sm-4 col-form-label">Data/Hora Final</label>
    <div class="col-sm-8">
      <input type="text" class="form-control date-time" id="end" placeholder="Data/Hora Final" name="end">
    </div>
  </div>
  <div class="form-group row">
    <label for="color" class="col-sm-4 col-form-label">Cor do Evento</label>
    <div class="col-sm-8">
      <input type="color" class="form-control" id="color" placeholder="Data/Hora Final" name="color">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-4 col-form-label">Descrição</label>
    <div class="col-sm-8">
      <textarea name="description" placeholder="Descrição do evento" id="description" cols="40" rows="4"></textarea>
    </div>
  </div>
  <input type="hidden" name="empresa_id" id="empresa_id" value="{{Auth::user()->empresa_id}}">

  <div class="form-group row">
    <label for="description" class="col-sm-4 col-form-label">Contatos</label>
    <div class="col-sm-8">
      <select id="contato_id" class="form-control">
        <option selected>Contatos</option>
        @foreach ($contato as $item)
        <option value="{{$item->id}}" id="{{$item->id}}">{{$item->nome}}</option>
        @endforeach
      </select>
    </div>
  </div>
</form>
