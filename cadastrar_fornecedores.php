<div class="container-fluid">
  <form method="post" action="confirmar_cadastro_fornecedor">
    <h2 class="my-3">Cadastrar Fornecedores</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" placeholder="Nome do fornecedor" id="nome" name="nome">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="cpf/cnpj">CPF/CNPJ</label>
          <input type="text" class="form-control" placeholder="Cnpj ou Cpf" id="cpf/cnpj" name="cpf/cnpj">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" placeholder="Telefone" id="telefone" name="telefone">
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
          <label for="contato">Contato</label>
          <input type="text" class="form-control" id="contato" name="contato" placeholder="Nome do responsável pela emrpresa">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->


    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="cep">Cep</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o cep sem pontos ou traços">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="rua">Rua</label>
          <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe a rua">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="numero">Número</label>
          <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe o estado">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->

    <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
