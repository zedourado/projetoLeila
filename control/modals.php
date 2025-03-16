<!-- Modal -->
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