<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Título do Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEvent">
          <div id="message"></div>
          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">#ID</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="id" name="id">
            </div>

            <label for="title" class="col-sm-2 col-form-label">Ultima Atualização</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="updated_at" name="updated_at">
            </div>

            <label for="title" class="col-sm-2 col-form-label">Email Verificado</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="email_verified_at" name="email_verified_at">
            </div>
          </div>

          <div class="form-group row">
            <label for="title" class="col-sm-4 col-form-label">Nome</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name" placeholder="Nome Completo" name="name">
            </div>
          </div>

          <div class="form-group row">
            <label for="start" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="text" class="form-control email" id="email" placeholder="Email" name="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="end" class="col-sm-4 col-form-label">Senha</label>
            <div class="col-sm-8">
              <input type="password" class="form-control password" id="password" placeholder="Senha" name="password">
            </div>
          </div>
          <div class="form-group row">
            <label for="color" class="col-sm-4 col-form-label">Confirmação de Senha</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="remember_token" placeholder="Confirmação de Senha" name="remember_token">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label">Descrição</label>
            <div class="col-sm-8">
                <textarea name="description" placeholder="Descrição do evento" id="description" cols="40" rows="4"></textarea>
            </div>
          </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <select id="contato_id" class="form-control">
                        <option selected>Contatos</option>
                        @foreach ($contato as $item)
                        <option value="{{$item->id}}" id="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        @if (Auth::user()->profile == 'Administrador' )
        <button type="button" class="btn btn-danger deleteUser">Excluir</button>
        <button type="button" class="btn btn-primary saveUser">Salvar</button>
        @endif
      </div>
    </div>
  </div>
</div>
