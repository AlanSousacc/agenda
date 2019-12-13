@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="status">Status</label>
      <div class="input-group">
        <select class="form-control status" id="status" name="status" {{old('status')}}>
          <option value="1">Ativo</option>
          <option value="0">Inativo</option>
        </select>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="razaosocial">Razão Social</label>
      <div class="input-group">
        <input type="text" class="form-control razaosocial" id="razaosocial" placeholder="Digite razão social" value="{{old('razaosocial')}}" name="razaosocial" required autofocus minlength="5" maxlength="40">
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="nomefantasia">Nome Fantasia</label>
      <div class="input-group">
        <input type="text" class="form-control nomefantasia" id="nomefantasia" placeholder="Digite o nome fantasia" value="{{old('nomefantasia')}}" name="nomefantasia" required autofocus>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="apelido">Apelido</label>
      <div class="input-group">
        <input type="text" class="form-control apelido" id="apelido" placeholder="Digite o apelido" value="{{old('apelido')}}" name="apelido" required autofocus>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="cnpj">CNPJ</label>
      <div class="input-group">
        <input type="text" class="form-control cnpj" id="cnpj" placeholder="Digite o CNPJ" value="{{old('cnpj')}}" name="cnpj" required autofocus maxlength="18">
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="ie">Inscrição Estadual</label>
      <div class="input-group">
        <input type="text" class="form-control ie" id="ie" placeholder="Digite a Inscrição estadual" value="{{old('ie')}}" name="ie" autofocus maxlength="14">
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="im">Inscrição Municipal</label>
      <div class="input-group">
        <input type="text" class="form-control im" id="im" placeholder="Digite a inscrição municipal" value="{{old('im')}}" name="im" autofocus>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="telefone">Telefone</label>
      <div class="input-group">
        <input type="tel" class="form-control telefone" id="telefone" placeholder="Telefone" value="{{old('telefone')}}" name="telefone" required autofocus min="16">
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="email">E-mail</label>
      <div class="input-group">
        <input type="email" class="form-control email" id="email" placeholder="Digite o email" value="{{old('email')}}" name="email" required autofocus>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="cidade">Cidade</label>
      <div class="input-group">
        <input type="text" class="form-control cidade" id="cidade" placeholder="Digite a cidade" value="{{old('cidade')}}" name="cidade" autofocus>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="endereco">Endereço</label>
      <div class="input-group">
        <input type="text" class="form-control endereco" id="endereco" placeholder="Digite endereço" value="{{old('endereco')}}" name="endereco" autofocus minlength="3" maxlength="30">
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="numero">Número</label>
      <div class="input-group">
        <input type="text" class="form-control numero" id="numero" placeholder="Número" value="{{old('numero')}}" name="numero" autofocus min="1" max="5">
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="cep">CEP</label>
      <div class="input-group">
        <input type="text" class="form-control cep" id="cep" placeholder="CEP" value="{{old('cep')}}" name="cep" autofocus min="9">
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="bairro">Bairro</label>
      <div class="input-group">
        <input type="text" class="form-control bairro" id="bairro" placeholder="Digite a bairro" value="{{old('bairro')}}" name="bairro" autofocus>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <input type="file" id="logo" name="logo">
  </div>
</div>
<br>
