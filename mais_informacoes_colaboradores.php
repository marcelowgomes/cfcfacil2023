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
                    <input type="text" class="form-control" placeholder="Somente números" id="identidade" name="identidade">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="data_nascimento">Data nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
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
                    <label for="filiacao_mae">Filiação Mãe</label>
                    <input type="text" class="form-control" id="filiacao_mae" name="filiacao_mae" placeholder="Informe nome da mãe">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <input type="radio" class="form-control" id="sexo" name="sexo" value="Masculino">
                    <input type="radio" class="form-control" id="sexo" name="sexo" value="Feminino">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->

        <h2 class="my-3">Informações Trabalhista</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ctps">CTPS</label>
                    <input type="text" class="form-control" placeholder="Informe a CTPS" id="ctps" name="ctps">
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exame_saude">Vencimento exame de saúde</label>
                    <input type="date" class="form-control" id="exame_saude" name="exame_saude">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_contrato">Data Contrato</label>
                    <input type="date" class="form-control" id="data_contrato" name="data_contrato">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="recisao">Recisão</label>
                    <input type="date" class="form-control" id="recisao" name="recisao">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>

        <?php
        if ($eh_pratico || $eh_teorico) {
        ?>

        <!--  row   -->
        <h2 class="my-3">Informações do DETRAN</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="carteira_habilitacao">Carteira de Habilitação</label>
                    <input type="text" class="form-control" placeholder="Informe a cnh" id="carteira_habilitacao" name="carteira_habilitacao">
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="vencimento_carteira">Vencimento</label>
                    <input type="date" class="form-control" id="vencimento_carteira" name="vencimento_carteira">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="registro_detran">Registro Detran</label>
                    <input type="date" class="form-control" id="registro_detran" name="registro_detran">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="vencimento_registro">Vencimento</label>
                    <input type="date" class="form-control" id="vencimento_registro" name="vencimento_registro">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->

        <?php
        }
        ?>

        <h2 class="my-3">Endereço</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" placeholder="Informe o cep sem pontos ou traços" id="cep" name="cep">
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" placeholder="Informe a rua" id="rua" name="rua">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" placeholder="Informe o número" id="numero" name="numero">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" placeholder="Informe o bairro" id="bairro" name="bairro">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe a cidade">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" placeholder="Informe o estado" id="estado" name="estado">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->


        <h2 class="my-3">Dados de contato</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" placeholder="Informe o telefone" id="telefone" name="telefone">
                </div>
            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone_celular">Telefone Celular</label>
                    <input type="text" class="form-control" placeholder="Informe o celular" id="telefone_celular" name="telefone_celular">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" placeholder="Informe o email" id="email" name="email">
                </div>


            </div>
            <!--  col-md-6   -->

            <div class="col-md-6">

                <div class="form-group">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Informe o Whatsapp">
                </div>
            </div>
            <!--  col-md-6   -->
        </div>
        <!--  row   -->

        <?php
        if ($eh_administrativo) {
        ?>

            <h2 class="my-3">Dados acesso ao sistema</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="liberar_acesso">Liberar Acesso</label>
                        <select class="form-control" placeholder="Informe o liberar_acesso" id="liberar_acesso" name="liberar_acesso">
                            <option value="">Informe</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="login_acesso">Login Acesso</label>
                        <input type="text" class="form-control" placeholder="Informe um login para acesso ao sistema" id="login_acesso" name="login_acesso">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="text" class="form-control" placeholder="Informe uma senha" id="senha" name="senha">
                    </div>


                </div>
                <!--  col-md-6   -->
            </div>


        <?php
        }
        ?>

        <?php
        if ($eh_pratico || $eh_teorico) {
        ?>
            <h2 class="my-3">Dados pagamentos Aulas</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="simulador">Simulador</label>
                        <input type="number" class="form-control" id="simulador" name="simulador">
                    </div>
                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="moto">Moto</label>
                        <input type="number" class="form-control" id="moto" name="moto">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="carro">Carro</label>
                        <input type="number" class="form-control" id="carro" name="carro">
                    </div>
                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="caminhao">Caminhão</label>
                        <input type="number" class="form-control" id="caminhao" name="caminhao">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="carreta">Carreta</label>
                        <input type="number" class="form-control" id="carreta" name="carreta">
                    </div>
                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="onibus">Ônibus</label>
                        <input type="number" class="form-control" id="onibus" name="onibus">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <h2 class="my-3">Dados pagamentos Exames</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aprovado_moto">Aprovado Moto</label>
                        <input type="number" class="form-control" id="aprovado_moto" name="aprovado_moto">
                    </div>
                </div>
                <!--  col-md-6   -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reprovado_moto">Reprovado Moto</label>
                        <input type="number" class="form-control" id="reprovado_moto" name="reprovado_moto">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aprovado_carro">Aprovado Carro</label>
                        <input type="number" class="form-control" id="aprovado_carro" name="aprovado_carro">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reprovado_carro">Reprovado Carro</label>
                        <input type="number" class="form-control" id="reprovado_carro" name="reprovado_carro">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aprovado_caminhao">Aprovado Caminhão</label>
                        <input type="number" class="form-control" id="aprovado_caminhao" name="aprovado_caminhao">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reprovado_caminhao">Reprovado Caminhão</label>
                        <input type="number" class="form-control" id="reprovado_caminhao" name="reprovado_caminhao">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aprovado_carreta">Aprovado Carreta</label>
                        <input type="number" class="form-control" id="aprovado_carreta" name="aprovado_carreta">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reprovado_carreta">Reprovado Carreta</label>
                        <input type="number" class="form-control" id="reprovado_carreta" name="reprovado_carreta">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aprovado_onibus">Aprovado Ônibus</label>
                        <input type="number" class="form-control" id="aprovado_onibus" name="aprovado_onibus">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reprovado_onibus">Reprovado Ônibus</label>
                        <input type="number" class="form-control" id="reprovado_onibus" name="reprovado_onibus">
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
        <?php
        }
        ?>

        <h2 class="my-3">Observações</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <textarea type="text" class="form-control" id="observações" name="observações">
                    </textarea>
                </div>
            </div>

    </form>
    <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>

</div>