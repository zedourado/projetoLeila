<!-- Modal Cadastro de Clientes -->
<div class="modal fade" id="cadastroLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-person-plus"></i> Cadastro de Novo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCadastroLogin">
            <div class="row">
            <div class="col-6">
                <label for="CLIENTE_NOME">Nome Completo:</label>
                <input type="text" class="form-control form-control-sm" name="CLIENTE_NOME" id="CLIENTE_NOME">
            </div>
            <div class="col-3">
                <label for="CLIENTE_SEXO">Sexo:</label><br>
                <select class="form-select form-select-sm" name="CLIENTE_SEXO" id="CLIENTE_SEXO">
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMININO">Feminino</option>
                </select>
            </div>
            <div class="col-3">
                <label for="CLIENTE_NASCIMENTO">Data de Nascimento:</label>
                <input type="date" class="form-control form-control-sm" name="CLIENTE_NASCIMENTO" id="CLIENTE_NASCIMENTO">
            </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="CLIENTE_CEP">CEP:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_CEP" id="CLIENTE_CEP">
                </div>
                <div class="col-4">
                    <label for="CLIENTE_LOGRADOURO">Endereço:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_LOGRADOURO" id="CLIENTE_LOGRADOURO">
                </div>
                <div class="col-2">
                    <label for="CLIENTE_NUMERO">Número:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_NUMERO" id="CLIENTE_NUMERO">
                </div>
                <div class="col-4">
                    <label for="CLIENTE_COMPLEMENTO">Complemento:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_COMPLEMENTO" id="CLIENTE_COMPLEMENTO">
                </div>
            </div>
            <div class="row">
            <div class="col-5">
                <label for="CLIENTE_BAIRRO">Bairro:</label>
                <input type="text" class="form-control form-control-sm" name="CLIENTE_BAIRRO" id="CLIENTE_BAIRRO">
            </div>
            <div class="col-5">
                <label for="CLIENTE_CIDADE">Cidade:</label>
                <input type="text" class="form-control form-control-sm" name="CLIENTE_CIDADE" id="CLIENTE_CIDADE">
            </div>
            <div class="col-2">
                <label for="CLIENTE_COMPLEMENTO">UF:</label>
                <select name="CLIENTE_UF" id="CLIENTE_UF" class="form-select fomr-select-sm" required>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP" selected>SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="CLIENTE_EMAIL">E-mail:</label>
                    <input type="email" class="form-control form-control-sm" name="CLIENTE_EMAIL" id="CLIENTE_EMAIL">
                </div>
                <div class="col-3">
                    <label for="CLIENTE_TELEFONE">Telefone:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_TELEFONE" id="CLIENTE_TELEFONE">
                </div>
                <div class="col-3">
                    <label for="CLIENTE_CELULAR">Celular/WhatsApp:</label>
                    <input type="text" class="form-control form-control-sm" name="CLIENTE_CELULAR" id="CLIENTE_CELULAR">
                </div>
            </div>
            <hr>
            <div class="row">
            <h6>Senha:</h6>
            <div class="col-4">
                <label for="CLIENTE_SENHA">Digite uma Senha:</label>
                <input type="password" class="form-control form-control-sm" name="CLIENTE_SENHA" id="CLIENTE_SENHA">
            </div>
            <div class="col-4">
                <label for="CLIENTE_SENHA2">Confirme a sua Senha:</label>
                <input type="password" class="form-control form-control-sm" name="CLIENTE_SENHA2" id="CLIENTE_SENHA2">
            </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cancelar</button>
        <button type="button" onclick="cadastroClienteLogin()" class="btn btn-success"><i class="bi bi-floppy"></i> Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cadastro de Colaboradores -->
<div class="modal fade" id="cadastroColaborador" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-person-badge"></i> Cadastro de Novo Colaborador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCadastroColaborador">
            <div class="row">
            <div class="col-6">
                <label for="COLAB_NOME">Nome Completo:</label>
                <input type="text" class="form-control form-control-sm" name="COLAB_NOME" id="COLAB_NOME">
            </div>
            <div class="col-3">
                <label for="COLAB_SEXO">Sexo:</label><br>
                <select class="form-select form-select-sm" name="COLAB_SEXO" id="COLAB_SEXO">
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMININO">Feminino</option>
                </select>
            </div>
            <div class="col-3">
                <label for="COLAB_NASCIMENTO">Data de Nascimento:</label>
                <input type="date" class="form-control form-control-sm" name="COLAB_NASCIMENTO" id="COLAB_NASCIMENTO">
            </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="COLAB_CEP">CEP:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_CEP" id="COLAB_CEP">
                </div>
                <div class="col-4">
                    <label for="COLAB_LOGRADOURO">Endereço:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_LOGRADOURO" id="COLAB_LOGRADOURO">
                </div>
                <div class="col-2">
                    <label for="COLAB_NUMERO">Número:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_NUMERO" id="COLAB_NUMERO">
                </div>
                <div class="col-4">
                    <label for="COLAB_COMPLEMENTO">Complemento:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_COMPLEMENTO" id="COLAB_COMPLEMENTO">
                </div>
            </div>
            <div class="row">
            <div class="col-5">
                <label for="COLAB_BAIRRO">Bairro:</label>
                <input type="text" class="form-control form-control-sm" name="COLAB_BAIRRO" id="COLAB_BAIRRO">
            </div>
            <div class="col-5">
                <label for="COLAB_CIDADE">Cidade:</label>
                <input type="text" class="form-control form-control-sm" name="COLAB_CIDADE" id="COLAB_CIDADE">
            </div>
            <div class="col-2">
                <label for="COLAB_COMPLEMENTO">UF:</label>
                <select name="COLAB_UF" id="COLAB_UF" class="form-select fomr-select-sm" required>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP" selected>SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="COLAB_EMAIL">E-mail:</label>
                    <input type="email" class="form-control form-control-sm" name="COLAB_EMAIL" id="COLAB_EMAIL">
                </div>
                <div class="col-3">
                    <label for="COLAB_TELEFONE">Telefone:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_TELEFONE" id="COLAB_TELEFONE">
                </div>
                <div class="col-3">
                    <label for="COLAB_CELULAR">Celular/WhatsApp:</label>
                    <input type="text" class="form-control form-control-sm" name="COLAB_CELULAR" id="COLAB_CELULAR">
                </div>
            </div>
            <hr>
            <div class="row">
                <h6>Senha:</h6>
                <div class="col-3">
                    <label for="COLAB_SENHA">Digite uma Senha:</label>
                    <input type="password" class="form-control form-control-sm" name="COLAB_SENHA" id="COLAB_SENHA">
                </div>
                <div class="col-3">
                    <label for="COLAB_SENHA2">Confirme a Senha:</label>
                    <input type="password" class="form-control form-control-sm" name="COLAB_SENHA2" id="COLAB_SENHA2">
                </div>
                <div class="col-6">
                <label>Permissão:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="COLAB_PERMISSAO" id="inlineRadio1" value="ADMIN">
                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="COLAB_PERMISSAO" id="inlineRadio2" value="GERENCIA">
                        <label class="form-check-label" for="inlineRadio2">Gerencia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="COLAB_PERMISSAO" id="inlineRadio3" value="USUARIO">
                        <label class="form-check-label" for="inlineRadio3">Usuário</label>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cancelar</button>
        <button type="button" onclick="cadastroColaborador()" class="btn btn-success"><i class="bi bi-floppy"></i> Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal List Clientes -->
<div class="modal fade" id="listClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-people"></i> Clientes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Código  </th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody id="tbodyClientesList">
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal List Colaboradores -->
<div class="modal fade" id="listColaboradores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-badge"></i> Colaboradores</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Código  </th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="tbodyColaboradoresList">
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i> Fechar</button>
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#cadastroColaborador"><i class="bi bi-plus"></i> Adicionar Colaborador</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Cliente -->
<div class="modal fade" id="viewCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5"><i class='bi bi-person'></i> Visualizar Cliente</h1>
        <button type="button" class="btn-close" onclick="listClientes()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label for="CLIENTE_NOME">Nome Completo:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_NOME" id="nomeCliente">
            </div>
            <div class="col-3">
                <label for="CLIENTE_SEXO">Sexo:</label><br>
                <select class="form-select form-select-sm" name="CLIENTE_SEXO" id="sexoCliente">
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMININO">Feminino</option>
                </select>
            </div>
            <div class="col-3">
                <label for="CLIENTE_NASCIMENTO">Data de Nascimento:</label>
                <input readonly type="date" class="form-control form-control-sm" name="CLIENTE_NASCIMENTO" id="nascCliente">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="CLIENTE_CEP">CEP:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CEP" id="CEPCliente">
            </div>
            <div class="col-4">
                <label for="CLIENTE_LOGRADOURO">Endereço:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_LOGRADOURO" id="ruaCliente">
            </div>
            <div class="col-2">
                <label for="CLIENTE_NUMERO">Número:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_NUMERO" id="numeroCliente">
            </div>
            <div class="col-4">
                <label for="CLIENTE_COMPLEMENTO">Complemento:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_COMPLEMENTO" id="complementoCliente">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="CLIENTE_BAIRRO">Bairro:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_BAIRRO" id="bairroCliente">
            </div>
            <div class="col-5">
                <label for="CLIENTE_CIDADE">Cidade:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CIDADE" id="cidadeCliente">
            </div>
            <div class="col-2">
                <label for="CLIENTE_COMPLEMENTO">UF:</label>
                <select name="CLIENTE_UF" id="UFCliente" class="form-select fomr-select-sm" required>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP" selected>SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="CLIENTE_EMAIL">E-mail:</label>
                <input readonly type="email" class="form-control form-control-sm" name="CLIENTE_EMAIL" id="emailCliente">
            </div>
            <div class="col-3">
                <label for="CLIENTE_TELEFONE">Telefone:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_TELEFONE" id="telefoneCliente">
            </div>
            <div class="col-3">
                <label for="CLIENTE_CELULAR">Celular/WhatsApp:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CELULAR" id="celularCliente">
            </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" onclick="listClientes()" data-bs-dismiss="modal"><i class='bi bi-x'></i> Fechar</button>
        <button type="button" class="btn btn-sm btn-primary"><i class='bi bi-pencil'></i> Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Colaborador -->
<div class="modal fade" id="viewColaborador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5"><i class='bi bi-person-badge'></i> Visualizar Colaborador</h1>
        <button type="button" class="btn-close" onclick="listColaboradores()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label for="CLIENTE_NOME">Nome Completo:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_NOME" id="nomeColaborador">
            </div>
            <div class="col-3">
                <label for="CLIENTE_SEXO">Sexo:</label><br>
                <select class="form-select form-select-sm" name="CLIENTE_SEXO" id="sexoColaborador">
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMININO">Feminino</option>
                </select>
            </div>
            <div class="col-3">
                <label for="CLIENTE_NASCIMENTO">Data de Nascimento:</label>
                <input readonly type="date" class="form-control form-control-sm" name="CLIENTE_NASCIMENTO" id="nascColaborador">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="CLIENTE_CEP">CEP:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CEP" id="CEPColaborador">
            </div>
            <div class="col-4">
                <label for="CLIENTE_LOGRADOURO">Endereço:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_LOGRADOURO" id="ruaColaborador">
            </div>
            <div class="col-2">
                <label for="CLIENTE_NUMERO">Número:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_NUMERO" id="numeroColaborador">
            </div>
            <div class="col-4">
                <label for="CLIENTE_COMPLEMENTO">Complemento:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_COMPLEMENTO" id="complementoColaborador">
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label for="CLIENTE_BAIRRO">Bairro:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_BAIRRO" id="bairroColaborador">
            </div>
            <div class="col-5">
                <label for="CLIENTE_CIDADE">Cidade:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CIDADE" id="cidadeColaborador">
            </div>
            <div class="col-2">
                <label for="CLIENTE_COMPLEMENTO">UF:</label>
                <select name="CLIENTE_UF" id="UFColaborador" class="form-select fomr-select-sm" required>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP" selected>SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="CLIENTE_EMAIL">E-mail:</label>
                <input readonly type="email" class="form-control form-control-sm" name="CLIENTE_EMAIL" id="emailColaborador">
            </div>
            <div class="col-3">
                <label for="CLIENTE_TELEFONE">Telefone:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_TELEFONE" id="telefoneColaborador">
            </div>
            <div class="col-3">
                <label for="CLIENTE_CELULAR">Celular/WhatsApp:</label>
                <input readonly type="text" class="form-control form-control-sm" name="CLIENTE_CELULAR" id="celularColaborador">
            </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" onclick="listColaboradores()" data-bs-dismiss="modal"><i class='bi bi-x'></i> Fechar</button>
        <button type="button" class="btn btn-sm btn-primary"><i class='bi bi-pencil'></i> Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Agendamento Cliente-->
<div class="modal fade" id="addEventoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class='bi bi-calendar-plus'></i> Adicionar Agendamento</h1>
        <button type="button" onclick="listAgendamentosCliente(<?php echo $_SESSION['CLIENTE_ID'];?>)" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAddEventoCliente">
            <div class="">
                <label for="SERVICOS"><strong>Serviços:</strong></label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="EVENTO_SERVICOS[]" id="inlineCheckbox1" value="CORTE">
                    <label class="form-check-label" for="inlineCheckbox1"><i class='bi bi-scissors'></i> Corte</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="EVENTO_SERVICOS[]" id="inlineCheckbox2" value="TINTURA">
                    <label class="form-check-label" for="inlineCheckbox2"><i class="bi bi-droplet"></i> Tintura </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="EVENTO_SERVICOS[]" id="inlineCheckbox3" value="UNHAS">
                    <label class="form-check-label" for="inlineCheckbox3"><i class="bi bi-brush"></i> Unhas</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="EVENTO_SERVICOS[]" id="inlineCheckbox3" value="SPA">
                    <label class="form-check-label" for="inlineCheckbox3"><i class="bi bi-stars"></i> Spa</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for=""><strong>Data:</strong></label>
                    <input type="date" class="form-control form-control-sm" name="EVENTO_DATA" id="EVENTO_DATA">
                </div>
                <div class="col-6">
                    <label for=""><strong>Horário:</strong></label>
                    <input type="time" class="form-control form-control-sm" name="EVENTO_HORA" id="EVENTO_HORA">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="addEventoCliente(<?php echo $_SESSION['CLIENTE_ID'];?>)" class="btn btn-sm btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal List Agendamentos Cliente -->
<div class="modal fade" id="listAgendamentosCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-calendar"></i> Meus Agendamentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="listAgendamentos"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i>Fechar</button>
        <button type="button" onclick="openModalAddCliente(<?php echo $_SESSION['CLIENTE_ID'];?>)" class="btn btn-sm btn-success"><i class="bi bi-plus"></i> Adicionar Agendamento</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal List Agendamentos Administrativo -->
<div class="modal fade" id="listAgendamentosAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-calendar"></i> Agendamentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="listAgendamentos"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i>Fechar</button>
        <button type="button" onclick="openModalAddCliente(<?php echo $_SESSION['COLAB_ID'];?>)" class="btn btn-sm btn-success"><i class="bi bi-plus"></i> Adicionar Agendamento</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Agendamento -->
<div class="modal fade" id="viewAgendamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Visualizar Agendamento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label for="dataEvento"><strong>Data:</strong></label>
                    <p id="dataEvento"></p>
                </div>
                <div class="col-6">
                    <label for="horaEvento"><strong>Hora:</strong></label>
                    <p id="horaEvento"></p>
                </div>
            </div>
            <div class="row">
                <label for=""><strong>Serviços:</strong></label>

                <div class="col-3 tipoServicoCard" id="serCorte" style="display: none">
                    <h6><i class="bi bi-scissors"></i> Corte</h6>
                </div>
                <div class="col-3 tipoServicoCard" id="serTintura" style="display: none">
                    <h6><i class="bi bi-droplet"></i> Tintura</h6>
                </div>
                <div class="col-3 tipoServicoCard" id="serUnhas" style="display: none">
                    <h6><i class="bi bi-brush"></i> Unhas</h6>
                </div>
                <div class="col-3 tipoServicoCard" id="serSpa" style="display: none">
                    <h6><i class="bi bi-stars"></i> Spa</h6>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <label for="statusEvento"><strong>Profissional:</strong></label>
                    <p id="responsavelEvento"></p>
                </div>
                <div class="col-6">
                    <label for="statusEvento"><strong>Status:</strong></label>
                    <p id="statusEvento"><i class="bi bi-check" style="color:Green"></i> Confirmado</p>
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" id="btnCancelarEvento" class="btn btn-danger"><i class="bi bi-x"></i> Cancelar Agendamento</button>
        <button type="button" id="btnEditarEvento" class="btn btn-secondary"><i class="bi bi-pencil"></i> Editar Agendamento</button>
      </div>
    </div>
  </div>
</div>



