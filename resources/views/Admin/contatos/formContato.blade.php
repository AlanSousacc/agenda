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

        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-three-financeiro-tab" data-toggle="pill" href="#custom-tabs-three-financeiro" role="tab" aria-controls="custom-tabs-three-financeiro" aria-selected="false">Financeiro</a>
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
                    <option value="1" @if (isset($contatos->status) && ($contatos->status == 'Ativo')) selected @endif>Ativo</option>
                    <option value="0" @if (isset($contatos->status) && ($contatos->status == 'Inativo')) selected @endif>Inativo</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="grupo">Grupo*</label>
                <div class="input-group">
                  <select class="form-control grupo" id="grupo_id" name="grupo_id" {{old('grupo_id')}}>
                    <option value="1" @if (isset($contatos->grupo_id) && ($contatos->grupo_id == '1')) selected @endif>Criança</option>
                    <option value="2" @if (isset($contatos->grupo_id) && ($contatos->grupo_id == '2')) selected @endif>Adolescente</option>
                    <option value="3" @if (isset($contatos->grupo_id) && ($contatos->grupo_id == '3')) selected @endif>Adulto</option>
                    <option value="4" @if (isset($contatos->grupo_id) && ($contatos->grupo_id == '4')) selected @endif>Idoso</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="sexo">Sexo*</label>
                <div class="input-group">
                  <select class="form-control sexo" id="sexo" name="sexo" {{old('sexo')}}>
                    <option value="Feminino" @if (isset($contatos->sexo) && ($contatos->sexo == 'Feminino')) selected @endif>Feminino</option>
                    <option value="Masculino" @if (isset($contatos->sexo) && ($contatos->sexo == 'Masculino')) selected @endif>Masculino</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="tipocontato">Tipo Contato*</label>
                <div class="input-group">
                  <select class="form-control tipocontato" id="tipocontato" name="tipocontato" {{old('tipocontato')}}>
                    <option value="Profissional" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Profissional')) selected @endif>Profissional</option>
                    <option value="Paciente" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Paciente')) selected @endif>Paciente</option>
                    <option value="Cliente" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Cliente')) selected @endif>Cliente</option>
                    <option value="Aluno" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Aluno')) selected @endif>Aluno</option>
                    <option value="Fornecedor" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Fornecedor')) selected @endif>Fornecedor</option>
                    <option value="Funcionario" @if (isset($contatos->tipocontato) && ($contatos->tipocontato == 'Funcionario')) selected @endif>Funcionario</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="datanascimento">Data de Nascimento</label>
                <div class="input-group">
                  <input type="date" class="form-control datanascimento" id="datanascimento" placeholder="Data de nascimento" value="{{isset($contatos) ? $contatos->datanascimento : ''}}" name="datanascimento">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Nome Completo*</label>
                <div class="input-group">
                  <input type="text" class="form-control nome" id="nome" placeholder="Digite o nome completo" value="{{isset($contatos) ? $contatos->nome : ''}}" name="nome" required autofocus minlength="5" maxlength="30">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Email*</label>
                <div class="input-group">
                  <input type="email" class="form-control email" id="email" placeholder="Digite o email completo" value="{{isset($contatos) ? $contatos->email : ''}}" name="email" required autofocus>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="documento">CPF</label>
                <div class="input-group">
                  <input type="text" class="form-control documento" id="documento" placeholder="Digite o CPF" value="{{isset($contatos) ? $contatos->documento : ''}}" name="documento" autofocus max="14">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="endereco">Endereço</label>
                <div class="input-group">
                  <input type="text" class="form-control endereco" id="endereco" placeholder="Digite endereço" value="{{isset($contatos) ? $contatos->endereco : ''}}" name="endereco" autofocus minlength="3" maxlength="30">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="telefone">Telefone*</label>
                <div class="input-group">
                  <input type="tel" class="form-control telefone" id="telefone" placeholder="Telefone" value="{{isset($contatos) ? $contatos->telefone : ''}}" name="telefone" required autofocus min="16">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="numero">Número</label>
                <div class="input-group">
                  <input type="text" class="form-control numero" id="numero" placeholder="Número" value="{{isset($contatos) ? $contatos->numero : ''}}" name="numero" autofocus min="1" max="5">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <div class="input-group">
                  <input type="text" class="form-control cidade" id="cidade" placeholder="Digite a cidade" value="{{isset($contatos) ? $contatos->cidade : ''}}" name="cidade" autofocus minlength="5" maxlength="30">
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
                  <input type="text" name="valorsessao" class="form-control valorsessao" value="{{isset($contatos) ? $contatos->valorsessao : ''}}" id="valorsessao">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="escolaridade">Escolaridade</label>
                <div class="input-group">
                  <select class="form-control escolaridade" id="escolaridade" name="escolaridade">
                    <option value="" selected>Escolaridade</option>
                    <option value="Ensino Fundamental Completo" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Fundamental Completo')) selected @endif>Ensino Fundamental Completo</option>
                    <option value="Ensino Fundamental Incompleto" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Fundamental Incompleto')) selected @endif>Ensino Fundamental Incompleto</option>
                    <option value="Ensino Médio Completo" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Médio Completo')) selected @endif>Ensino Médio Completo</option>
                    <option value="Ensino Médio Incompleto" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Médio Incompleto')) selected @endif>Ensino Médio Incompleto</option>
                    <option value="Ensino Superior Completo" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Superior Completo')) selected @endif>Ensino Superior Completo</option>
                    <option value="Ensino Superior Incompleto" @if (isset($contatos->escolaridade) && ($contatos->escolaridade == 'Ensino Superior Incompleto')) selected @endif>Ensino Superior Incompleto</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="profissao">Profissão</label>
                <div class="input-group">
                  <input type="text" class="form-control profissao" id="profissao" placeholder="Digite a profissao" value="{{isset($contatos) ? $contatos->profissao : ''}}" name="profissao" maxlength="50">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nomeresponsavel">Nome do Responsável</label>
                <div class="input-group">
                  <input type="text" class="form-control nomeresponsavel" id="nomeresponsavel" placeholder="Digite nome do responsável" value="{{isset($contatos) ? $contatos->nomeresponsavel : ''}}" name="nomeresponsavel" maxlength="50">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="cpfresponsavel">CPF Responsável</label>
                <div class="input-group">
                  <input type="text" class="form-control cpfresponsavel" id="nome" placeholder="Digite o CPF do responsável" value="{{isset($contatos) ? $contatos->cpfresponsavel : ''}}" name="cpfresponsavel" maxlength="20">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nomeparente">Nome de um Parente</label>
                <div class="input-group">
                  <input type="text" class="form-control nomeparente" id="nomeparente" placeholder="Digite o nome de um parente" value="{{isset($contatos) ? $contatos->nomeparente : ''}}" name="nomeparente" maxlength="50">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="telefoneparente">Telefone Parente</label>
                <div class="input-group">
                  <input type="text" class="form-control telefoneparente" id="telefoneparente" placeholder="Telefone de um parente" value="{{isset($contatos) ? $contatos->telefoneparente : ''}}" name="telefoneparente" maxlength="50">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="observacao">Observação</label>
                <div class="input-group">
                  <textarea  class="form-control observacao" id="observacao" placeholder="Digite uma observação" name="observacao" maxlength="300">{{isset($contatos) ? $contatos->observacao : ''}}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- fim campos adicionais --}}

        {{-- campos Financeiro --}}
        <div class="tab-pane fade" id="custom-tabs-three-financeiro" role="tabpanel" aria-labelledby="custom-tabs-three-financeiro-tab">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;" >Condição Pagamento</th>
                <th class="th-sm" style="width: 200px;" >Data de Movimentação</th>
                <th class="th-sm" style="width: 120px;" >Observação</th>
                <th class="th-sm" style="width: 150px;" >Status Pagamento</th>
                <th class="th-sm" style="width: 161px;" >Email</th>
                <th class="text-center" style="width: 120px;" >Opções</th>
              </tr>
            </thead>
            <tbody>
              <tr role="row" class="odd">
                <td class="text-center">testes</td>
                <td class="text-center">testes</td>
                <td class="text-center">testes</td>
                <td class="text-center">testes</td>
                <td class="text-center">testes</td>
                <td class="text-center">testes</td>
              </tr>
              {{-- @foreach ($consulta as $item)
              <tr role="row" class="odd">
                <td class="text-center">{{$item->id}}</td>
                <td class="sorting_1">{{$item->nome}}</td>
                <td>{{$item->documento}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->email}}</td>
              </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
        {{-- fim campos Financeiro --}}
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
