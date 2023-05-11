<?php
$cpf = $_POST['cpf'];
$eh_administrativo = $_POST['administrativo'];
$eh_pratico = $_POST['pratico'];
$eh_teorico = $_POST['teorico'];
?>
<div class="container-fluid">
    <form method="post" action="confirmar_cadastro_colaboradores">
        <h2 class="my-3">Dados Pessoais</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome_completo">Nome Completo</label>
                    <input type="text" class="form-control" placeholder="Informe nome completo" id="nome_completo" name="nome_completo">
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" placeholder="" id="cpf" name="cpf" value="<?php echo ($cpf) ?>" readonly>
                </div>
            </div>
            <!--  col-md-6   -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identidade">Identidade</label>
                    <input type="text" class="form-control" placeholder="Somente números" id="rg" name="identidade">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="data_nascimento">Data nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="nascimento">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->


        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="natural_estado">Natural Estado</label>
                    <select type="text" class="form-control" id="natural_estado" name="natural_estado">
                        <option value="">Escolha um estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="natural_cidade">Natural Cidade</label>
                    <input type="text" class="form-control" id="natural_cidade" name="natural_cidade" placeholder="Natural Cidade">
                </div>
            </div>

           

            <div class="col-md-6">
                <div class="form-group">
                    <label for="sexo">Sexo</label><br>
                    Masculino <input type="radio" id="sexo" name="sexo" value="Masculino">
                   Feminino <input type="radio"  id="sexo" name="sexo" value="Feminino">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->

       

        <h2 class="my-3">Observações</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <textarea type="text" class="form-control" id="observações" name="observações">
                    </textarea>
                </div>
            </div>
<br>
<input type="hidden" class="form-control"  name="pratico" value="<?php echo ($_POST[pratico]) ?>" >
<input type="hidden" class="form-control"  name="teorico" value="<?php echo ($_POST[teorico]) ?>" >
<input type="hidden" class="form-control"  name="administrativo" value="<?php echo ($_POST[administrativo]) ?>" >

    <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>

</div></form>