<?php
include_once "bd/conexao.php";
$sql = "SELECT * from alunos WHERE aluno_id = '$id'";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
$sql2 = "SELECT * from pacotes WHERE id_pacote = '$id_pacote'";
$pacote = mysqli_query($conn, $sql2);
$dados_pacote = mysqli_fetch_assoc($pacote);
preg_match($pattern, $dados["aluno_telefones"], $matches);
$sql3 = "SELECT * from colaboradores";
$colaborador = mysqli_query($conn, $sql3);
?>
<div class="container-fluid">
    <div class="row rounded p-2" style="background-color: #F4F5F7">
        <div class="col">
            <h2>
                <?php echo ($dados['aluno_nome']) ?>
            </h2>
            <div class='mt-2 d-flex'>
                <p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
                <p class='mx-2'><strong>Telefone: </strong><?php echo ($matches[0]) ?></p>
            </div>
        </div>
    </div>

    <div class="widget-tabs-list">
        <p><strong>ITENS DO PACOTE</strong> </p>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="95%"><strong>Item</strong></td>
                    <td width="5%" align="center"><strong>QTD</strong></td>
                </tr>
            </tbody>
        </table><br>
        <br>
        <strong><br>
            FINALIZAR VENDA</strong>
        <p></p>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="3" cellpadding="3" border="0">
                            <tbody>
                                <tr>
                                    <td bgcolor="#D5E0D7">&nbsp;
                                        <table width="98%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="98%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="19%"><strong>Valor do pacote:</strong></td>
                                                                    <td width="81%"><input name="campo" type="text" class="form-control" id="campo" value="<?php echo $dados_pacote['valor_pacote'] ?>" readonly=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Descontos:</strong></td>
                                                                    <td>
                                                                        <form name="form1" method="post" action="desconto_pacote/7431/1/">
                                                                            <input name="desconto" type="text" required="" class="form-control" id="desconto" value="">
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Total com desconto:</strong></td>
                                                                    <td><input name="juros3" type="text" class="form-control" id="juros3" value="<?php echo $dados_pacote['valor_pacote'] ?>" size="8" readonly=""></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><strong>FORMAS DE PAGAMENTO</strong></td>
                                </tr>

                        </table>
                        <table style="padding-bottom: 20px;" width="100%" cellspacing="3" cellpadding="3" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td bgcolor="#D5E0D7"><strong>Dinheiro</strong></td>
                                    <td bgcolor="#D5E0D7"><strong>Cheque</strong></td>
                                    <td bgcolor="#D5E0D7"><strong>Cartão</strong></td>
                                    <td bgcolor="#D5E0D7"><strong>Promissória</strong></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#D5E0D7"><input name="dinheiro" type="text" required="" class="form-control" id="dinheiro" value="0.00" size="10"></td>
                                    <td bgcolor="#D5E0D7"><input name="cheque" type="text" required="" class="form-control" id="cheque" value="0.00" size="10"></td>
                                    <td bgcolor="#D5E0D7"><input name="cartao" type="text" required="" class="form-control" id="cartao" value="0.00" size="10"></td>
                                    <td bgcolor="#D5E0D7"><input name="outros" type="text" required="" class="form-control" id="outros" value="0.00" size="10"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#D5E0D7" align="center">


                    </td>
                </tr>
                <tr>
                    <td bgcolor="#D5E0D7">
                        <table width="100%" cellspacing="3" cellpadding="3" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td><strong>Data Lançamento</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="date" name="data" id="textfield" value="2023-03-22" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Responsável pelo lançamento
                                        </strong></td>
                                </tr>
                                <tr>
                                    <td><select name="quem" id="quem" class="form-control">
                                            <option value="">Selecione</option>
                                            <?php while ($dados = mysqli_fetch_assoc($colaborador)) {
                                                echo ("<option value='" . $dados['nome'] . "'>" . $dados['nome'] . "</option>");
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tr>
                <tr></tr>
                <tr>
                    <td bgcolor="#D5E0D7" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#D5E0D7" align="center"> <button class="btn btn-success notika-btn-success waves-effect">Fechar Venda</button> &nbsp;</td>
                </tr>
                <tr>
                    <td bgcolor="#D5E0D7" align="center">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="3" cellpadding="3" border="0">
            <tbody>
                <tr> </tr>
                <tr></tr>
            </tbody>
        </table>
        </td>
        </tr> ta 
        <tr>
            <td>&nbsp;</td>
        </tr>
        </tbody>
        </table>

        <p></p>
    </div>
</div>

<script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
<script>
    $('#desconto').blur(function (){
       let desconto = parseFloat($(this).val())
       let valorTotal = parseFloat($("#campo").val())

       $("#juros3").val((valorTotal - desconto).toFixed(2))
    })
</script>