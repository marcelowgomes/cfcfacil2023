<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

$sql = "SELECT * from alunos WHERE aluno_id = '$id' and aluno_cfc = $user[user_empresa] ";
$sql2 = "SELECT * from receitas_despesas where receita_cfc = $user[user_empresa] ";
$sql3 = "SELECT * from colaboradores ";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$produtos = mysqli_query($conn, $sql2);
$produto_dados = mysqli_fetch_all($produto);
$colaborador = mysqli_query($conn, $sql3);
$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
preg_match($pattern, $dados["aluno_telefones"], $matches);
?>
<style type="text/css">
        h1 {
            color:green;
        }
        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 14px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>

<div>
                 
                 <div>
                    <h4>Nova Venda -   <?php echo ($dados['aluno_nome']) ?> </h4>
                    <div class='mt-2 d-flex'>
        <p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
        <p class='mx-2'><strong>Telefone: </strong><?php echo ($matches[0]) ?></p>
      </div>
                 </div>  </div></div>

<br>


<div class="row">

<div class="col-4">
<div id="div-content" class="ap-po-details ap-po-details--2 p-25 radius-xl">


<div class="row ffp  justify-content-between "> 
<div class="col-6"><strong> Item </strong> </div> 
<div class="col-2"><strong> Valor </strong></div> 
<div class="col-2"><strong> Ação</strong> </div> 
</div> 


  <?php
  $x='0';
  while($produto = mysqli_fetch_array($produtos)) { 
  $x++;
  

    ?>

    <form id="formapagar<?php echo $x ?>" action="#" method="post" enctype="multipart/form-data">

<div class="row ffp ffp--hover justify-content-between "> 
<div class="col-6 ffp__title">
  
                                                         <h6>
                                                         <?php echo $produto[receita_nome] ?>
                                                   
                                                      <p class="d-block">
                                                      <?php echo $produto[receita_observacoes] ?>
                                                      </p>
                                                   </div>





<div class="col-2">R$<?php echo $produto[receita_valor] ?> </div> 
<div class="col-2">

<button type="submit" class="btn btn-success btn-circle btn-sm">+</button>
<input type="hidden" name="item"  value="<?php echo $produto[receita_id] ?>"> 
<input type="hidden" name="aluno"  value="<?php echo $id ?>"> 
<input type="hidden" name="categoria"  value="<?php echo $produto[receita_categoria] ?>"> 
<input type="hidden" name="subcategoria"  value="<?php echo $produto[receita_subcategoria] ?>"> 
<input type="hidden" name="valor"  value="<?php echo $produto[receita_valor] ?>"> 
<input type="hidden" name="custo"  value="<?php echo $produto[receita_custo] ?>"> 

</div> 

</div> 
  </form>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>	
$(document).ready(function() {
 $("#formapagar<?php echo $x ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'teste.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results").empty();
      $("#results").append(msg);
      document.getElementById("results").style.display = "block";

    }
  });
   return false;
 });
});
</script>


<?php } ?>


</div> 
  </div>




  <div class="col-8">
  
  <div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
                           <div id="div-content" class="ap-po-details ap-po-details--2 p-25 radius-xl justify-content-between">
<div class="row ffp  justify-content-between "> 
<div class="col-3"><strong> Item </strong> </div> 
<div class="col-2"><strong> QTD </strong></div> 
<div class="col-2"><strong> Desconto(-) </strong></div> 
<div class="col-2"><strong> Acrescimo(+) </strong> </div> 
<div class="col-2"><strong> Total</strong> </div> 
<div class="col-1"><strong> Ação</strong> </div> 


</div>

<div id="results" style="display:block"></div>	
<div id="results2" style="display:block"></div>	



</div> </div> </div> </div>

  
  </div>


</div>



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

  <div class="row mt-4">
    <div class="col-md-4 me-5 rounded pt-3" style="background-color: #F4F5F7">
      <form action="">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <thead>
            <tr>
              <td width="20%" align="center"><strong>Item</strong></td>
              <td width="20%" align="center"><strong>Valor</strong></td>
              <td style="display:none" width="20%" align="center"><strong><span class="form-group">
                    QTD
                  </span></strong></td>
              <td width="20%" align="center"><strong>Ação</strong></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produto_dados as $key => $value) { ?>
              <tr>
                <td class="item-val" width="40%" align="center"><?php echo $value[1] ?></td>
                <td class="preco-val" width="15%" align="center"><?php echo $value[5] ?></td>
                <td class="qtd-val" style="display:none" width="15%" align="center">1</td>
                <td class="id-item" style="display:none"><?php echo $key ?></td>
                <td width="15%" align="center">
                  <button class="btn-adicionar btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect">
                    <i class="fa fa-plus"></i>
                  </button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="col-md-6 rounded" style="background-color: #F4F5F7">
      <div class="row p-3">
        <div class="widget-tabs-list">
          <p><strong>CAIXA</strong></p>
          <p>&nbsp;</p>
          <table id="tabela-caixa" width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
              <tr>
                <td width="36%"><strong>Item</strong></td>
                <td width="11%" align="center"><strong>QTD</strong></td>
                <td width="14%" align="center"><strong>Desconto</strong></td>
                <td width="13%" align="center"><strong>Acrescimo</strong></td>
                <td width="15%" align="center"><strong>Total</strong></td>
                <td width="11%" align="center"><strong>Ação</strong></td>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table><br>
          <br>
          <p><strong><br>FINALIZAR VENDA</strong></p>

          <form id="form1" name="form1" method="post" action="inserir_venda">

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
                                          <td width="19%"><strong>Total:</strong></td>
                                          <td width="81%"><input name="campo" type="text" class="form-control" id="campo" value="0,00" size="10" readonly=""></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Descontos:</strong></td>
                                          <td><input name="desconto3" type="text" class="form-control" id="desconto3" value="0,00" size="8" readonly=""></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Acréscimos:</strong></td>
                                          <td><input name="juros3" type="text" class="form-control" id="juros3" value="0,00" size="8" readonly=""></td>
                                        </tr>
                                        <tr>
                                          <td><strong>Total a pagar:</strong></td>
                                          <td><input name="campo3" type="text" class="form-control" id="campo3" value="0,00" size="10"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><strong>FORMAS DE PAGAMENTO</strong></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                              </tbody>
                            </table>
                            <table width="98%" cellspacing="3" cellpadding="3" border="0" align="center">
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
                            <table width="98%" cellspacing="0" cellpadding="0" border="0" align="center">



                              <tbody>
                                <tr>
                                  <td><strong>Data Lançamento</strong></td>
                                </tr>
                                <tr>
                                  <td><label for="textfield"></label>
                                    <input type="date" name="data" id="textfield" value="2023-03-22" class="form-control">
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><strong>Responsável pelo lançamento
                                    </strong></td>
                                </tr>
                                <tr>
                                  <td><select name="quem" id="quem" class="form-control">
                                      <option value="">Selecione</option>
                                      <?php while($dados = mysqli_fetch_assoc($colaborador)){
                                          echo("<option value='".$dados['nome']."'>".$dados['nome']."</option>");
                                        }
                                        ?>
                                    </select></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#D5E0D7" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td bgcolor="#D5E0D7" align="center"><button class="btn btn-success">Fechar Venda</button></td>
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
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </form>
          <p></p>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
<script>
  let total_desconto = 0
  let total_acrescimo = 0
  $(".btn-adicionar").click(function(e) {
    e.preventDefault();
    let linhas = ($(this).parent().parent().children());
    let itemVal = linhas[0]['firstChild'].textContent;
    let precoVal = linhas[1]['firstChild'].textContent;
    let qtdVal = linhas[2]['firstChild'].textContent;
    let idItem = linhas[3]['firstChild'].textContent;
    if ($('#compra-' + idItem).length <= 0) {
      $("#tabela-caixa > tbody:last-child").append('<tr id="compra-' + idItem + '"><td>' + itemVal + '</td><td align="center" id="qtd-col-' + idItem + '">' + qtdVal +
        '</td><td align="center"><input class="input-caixa-desc" type="text" ></td><td align="center"><input class="input-caixa-acres" type="text" ></td><td align="center" class="preco-td" id="preco-col-' + idItem + '">' +
        precoVal + '</td><td align="center"><button class="btn btn-cyan cyan-icon-notika btn-reco-mg btn-button-mg waves-effect btn-atualizar"><i class="fa fa-retweet"></i></button></td></tr>')
    } else {
      let qtd = parseInt($('#qtd-col-' + idItem).text());
      qtd++
      $('#qtd-col-' + idItem).text(qtd);
      let valor = parseInt($('#preco-col-' + idItem).text());
      valor += parseInt(precoVal);
      $('#preco-col-' + idItem).text(valor.toFixed(2))
    }
    let valorTotal = 0;
    $(".preco-td").each(function(index) {
      valorTotal += parseFloat($(this).text());
    });
    valorTotal += total_acrescimo
    valorTotal -= total_desconto
    $('#campo').val(valorTotal.toFixed(2));
    $('#desconto3').val(total_desconto.toFixed(2))
    $('#juros3').val(total_acrescimo.toFixed(2))
    $('#campo3').val(valorTotal.toFixed(2));
  })

  $(document).on('click', '.btn-atualizar', function() {
    let valor_desconto = parseFloat($(this).parent().parent().children().find('.input-caixa-desc').val())
    desconto = valor_desconto ? valor_desconto : 0
    let valor_acrescimo = parseFloat($(this).parent().parent().children().find('.input-caixa-acres').val())
    acrescimo = valor_acrescimo ? valor_acrescimo : 0
    valor = parseFloat($('#campo3').val());
    valor += acrescimo
    valor -= desconto
    $('#campo3').val(valor.toFixed(2));
    total_desconto += desconto
    total_acrescimo += acrescimo
    $('#desconto3').val(total_desconto.toFixed(2))
    $('#juros3').val(total_acrescimo.toFixed(2))
  })
</script>

<style>
  .input-caixa-desc {
    width: 70px;
  }

  .input-caixa-acres {
    width: 70px;
  }
</style>