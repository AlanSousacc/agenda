<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<br>

<div class="col-12 col-sm-6 col-lg-12">
  <div class="card card-primary card-outline card-outline-tabs" style="    border-top: 0px solid #007bff;">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Dados Principais</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Dados Adicionais</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <div class="tab-content" id="custom-tabs-three-tabContent">
        {{-- capos principais --}}
        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="status">Status*</label>
                <div class="input-group">
                  <select class="form-control status" id="status" name="status" {{old('status')}}>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="grupo">Grupo*</label>
                <div class="input-group">
                  <select class="form-control grupo" id="grupo_id" name="grupo_id" {{old('grupo_id')}}>
                    <option value="1">Criança</option>
                    <option value="2">Adolescente</option>
                    <option value="3">Adulto</option>
                    <option value="4">Idoso</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="col-md-2">
              <div class="form-group">
                <label for="sexo">Sexo*</label>
                <div class="input-group">
                  <select class="form-control sexo" id="sexo" name="sexo" {{old('sexo')}}>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="tipocontato">Tipo Contato*</label>
                <div class="input-group">
                  <select class="form-control tipocontato" id="tipocontato" name="tipocontato" {{old('tipocontato')}}>
                    <option value="Profissional">Profissional</option>
                    <option value="Paciente">Paciênte</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Aluno">Aluno</option>
                    <option value="Fornecedor">Fornecedor</option>
                    <option value="Funcionario">Funcionário</option>
                  </select>
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="datanascimento">Data de Nascimento</label>
                <div class="input-group">
                  <input type="date" class="form-control datanascimento" id="datanascimento" placeholder="Data de nascimento" value="{{old('datanascimento')}}" name="datanascimento">
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Nome Completo*</label>
                <div class="input-group">
                  <input type="text" class="form-control nome" id="nome" placeholder="Digite o nome completo" value="{{old('nome')}}" name="nome" required autofocus minlength="5" maxlength="30">
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Email*</label>
                <div class="input-group">
                  <input type="email" class="form-control email" id="email" placeholder="Digite o email completo" value="{{old('email')}}" name="email" required autofocus>
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="documento">CPF</label>
                <div class="input-group">
                  <input type="text" class="form-control documento" id="documento" placeholder="Digite o CPF" value="{{old('documento')}}" name="documento" autofocus max="14">
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
                <label for="telefone">Telefone*</label>
                <div class="input-group">
                  <input type="tel" class="form-control telefone" id="telefone" placeholder="Telefone" value="{{old('telefone')}}" name="telefone" required autofocus min="16">
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
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <div class="input-group">
                  <input type="text" class="form-control cidade" id="cidade" placeholder="Digite a cidade" value="{{old('cidade')}}" name="cidade" autofocus minlength="5" maxlength="30">
                </div>
              </div>
            </div>
          </div>
          
        </div>
        {{-- fim campos principais --}}

        {{-- campos adicionais --}}
        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="valorsessao">Valor por Sessão</label>
                <div class="input-group input-group-md">
                  <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                  </div>
                  <input type="text" name="valorsessao" class="form-control valorsessao" id="valorsessao">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="escolaridade">Escolaridade</label>
                <div class="input-group">
                  <select class="form-control escolaridade" id="escolaridade" name="escolaridade" {{old('escolaridade')}}>
                    <option value="" selected>Escolaridade</option>
                    <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                    <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                    <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                    <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                    <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                    <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="profissao">Profissão</label>
                <div class="input-group">
                  <input type="text" class="form-control profissao" id="profissao" placeholder="Digite a profissao" value="{{old('profissao')}}" name="profissao" maxlength="50">
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="nomeresponsavel">Nome do Responsável</label>
                <div class="input-group">
                  <input type="text" class="form-control nomeresponsavel" id="nomeresponsavel" placeholder="Digite nome do responsável" value="{{old('nomeresponsavel')}}" name="nomeresponsavel" maxlength="50">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="cpfresponsavel">CPF Responsável</label>
                <div class="input-group">
                  <input type="text" class="form-control cpfresponsavel" id="nome" placeholder="Digite o CPF do responsável" value="{{old('cpfresponsavel')}}" name="cpfresponsavel" maxlength="20">
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="nomeparente">Nome de um Parente</label>
                <div class="input-group">
                  <input type="text" class="form-control nomeparente" id="nomeparente" placeholder="Digite o nome de um parente" value="{{old('nomeparente')}}" name="nomeparente" maxlength="50">
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefoneparente">Telefone Parente</label>
                <div class="input-group">
                  <input type="text" class="form-control telefoneparente" id="telefoneparente" placeholder="Telefone de um parente" value="{{old('telefoneparente')}}" name="telefoneparente" maxlength="50">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="observacao">Observação</label>
                <div class="input-group">
                  <textarea  class="form-control observacao" id="observacao" placeholder="Digite uma observação" value="{{old('observacao')}}" name="observacao" maxlength="300"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- fim campos adicionais --}}
      </div>
      <input type="submit" name="submit" class="btn-alt btn btn-success btn-sm" value="Cadastrar" />
    </div>
    <!-- /.card -->
  </div>
</div>