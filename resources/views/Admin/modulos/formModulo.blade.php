<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<br>

<div class="col-12 col-sm-6 col-lg-12">
  <div class="card card-primary card-outline card-outline-tabs" style="    border-top: 0px solid #007bff;">
    <div class="card-header p-0 border-bottom-0">

    </div>

    <div class="card-body">

          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Nome do Módulo</label>
                <div class="input-group">
                  <input type="text" class="form-control nome" id="nome" placeholder="Digite o nome do módulo" name="nome" autofocus minlength="3" maxlength="30">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <label for="descricao">Descrição</label>
                <div class="input-group">
                  <input type="text" class="form-control descricao" id="descricao" placeholder="Digite a uma breve descrição sobre o Módulo"  name="descricao" autofocus minlength="5" maxlength="80">
                </div>
              </div>
            </div>
          </div>

    </div>
    <!-- /.card -->
  </div>
</div>
