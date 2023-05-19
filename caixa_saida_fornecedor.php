<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


$qtd = $_POST['qtd']; 
$item = $_POST['item'];
$sub = $_POST['subcategoria'];
$cat = $_POST['categoria'];
$valor = $_POST['valor'];
$fornecedor = $_POST['fornecedor'];
$oco = 'Saida';
$custo = $_POST['custo'];
if($_POST['desconto'] =='') {
$desconto = '0.00'; 
} else { 
$desconto = $_POST['desconto'];
}
if($_POST['acrescimo'] =='') {
  $acrescimo = '0.00'; 
  } else { 
  $acrescimo = $_POST['acrescimo'];
  }
$sql2 = "SELECT * from carrinho  where carrinho_fornecedor = $fornecedor and carrinho_status='1' and carrinho_cfc = $user[user_empresa] and carrinho_item = $item      ";
$exe2 = mysqli_query($conn, $sql2);
$totalitens =mysqli_num_rows($exe2);

if($qtd  == '0') { 

  $conn->query("DELETE from carrinho  where carrinho_item = $item and carrinho_status = '1' and carrinho_cfc = $user[user_empresa] and carrinho_fornecedor = $fornecedor  ");

}

if(($totalitens == '0') and ($qtd  <> '0')) {
@$conn->query($insert = "INSERT INTO carrinho (carrinho_item, carrinho_qtd, carrinho_usuario, carrinho_fornecedor ,
carrinho_cfc,carrinho_categoria, carrinho_subcategoria, carrinho_ocorrencia	,carrinho_valorun,carrinho_desconto, carrinho_acrescimo) VALUES ('$item','$qtd','$user[id_user]',
'$fornecedor','$user[user_empresa]','$cat','$sub','$oco','$valor','$desconto','$acrescimo')");

//print $insert;
 } else {
$conn->query("update carrinho set carrinho_qtd = $qtd , carrinho_desconto = $desconto , carrinho_acrescimo = $acrescimo where carrinho_fornecedor = $fornecedor and carrinho_status='1' and carrinho_cfc = $user[user_empresa] and carrinho_item = $item  ");
 }


$sql = "SELECT * from carrinho c inner join receitas_despesas rd ON c.carrinho_item = rd.receita_id where c.carrinho_fornecedor = $fornecedor and c.carrinho_status='1' and c.carrinho_cfc = $user[user_empresa] and c.carrinho_ocorrencia = '$oco' order by c.carrinho_id desc " ;
$exe = mysqli_query($conn, $sql);
$x='0';
?>



<table class="table table--default table-borderless ">
<thead>
                        <tr class="bg-secondary">
                           <th class="text-white">Item</th>
                           <th  class="text-center text-white">QTD.</th>
                           <th  class="text-center text-white">Acrescimo</th>
                           <th  class="text-center text-white">Desconto</th>
                           <th class="text-white">Total</th>
                        </tr>
                     </thead>
  <?php
while($linha = mysqli_fetch_array($exe)) { 
  $x++;
 

$totalitem = $linha[receita_valor] * $linha[carrinho_qtd] + $linha[carrinho_acrescimo] - $linha[carrinho_desconto];
$total2 += $totalitem;

/// total sem acrescimos e descontos
$totalitem2= $linha[receita_valor] * $linha[carrinho_qtd];
$total2a += $totalitem2;

/// total descontos
$totaldescontos += $linha[carrinho_desconto];

/// total acrescimos
$totalacrescimo += $linha[carrinho_acrescimo];

  ?>

                   
<tbody>
                      
                        <tr>
                           <td>
                              <?php echo $linha[receita_nome] ?>
                           </td>
                           <td  class="text-center"> <?php echo $linha[carrinho_qtd] ?></td>
                           <td  class="text-center"> <?php echo $linha[carrinho_acrescimo] ?></td>
                           <td  class="text-center"> <?php echo $linha[carrinho_desconto] ?></td>
                           <td > R$<?php echo number_format($totalitem, 2, ',', '.');  ?></td>

                        </tr>
                        
                        
                     </tbody>
  
  
<?php } ?>

  </table>

  <table class="table table--default table-borderless ">
<thead>
                        <tr class="bg-info">
                           <th><strong class="text-white"> RESUMO</strong></th>
                           
                        </tr>
                     </thead>

                     </table>

 
                     <div class="row"> 

<div class="col-3"> 
Total
</div>
<div class="col-3"> 
<input class="form-control" value="<?php echo number_format($total2a, 2, ',', '.');  ?>"> 
</div>
<div class="col-3"> 
Acréscimos
</div>
<div class="col-3">   
<input class="form-control" value="<?php echo number_format($totalacrescimo, 2, ',', '.');  ?>"> 
</div>
<div class="col-3"> 
Descontos
</div>
<div class="col-3"> 
<input class="form-control" value="<?php echo number_format($totaldescontos, 2, ',', '.');  ?>"> 
</div>
<div class="col-3"> 
A Pagar
</div>
<div class="col-3"> 
<input class="form-control" value="<?php echo number_format($total2 , 2, ',', '.');  ?>"> 
</div>


</div>

               <br>


               <table class="table table--success table-borderless ">
<thead >
                        <tr class="bg-success text-white">
                           <th><strong class="text-white">Formas de Pagamento</strong></th>
                           
                        </tr>
                     </thead>



</table>
<form id="finalizarvenda" action="#" method="post">

<div class="row"> 
<!-- DINHEIRO -->

<div class="col-12"> 
<input type="checkbox" id="chkDinheiro" name="scales" >
Dinheiro
</div>
<div id="divDinheiro" name="dinheiro" class="col-12" runat="server" style="display:none"><label> <strong>Informe o valor pago em dinheiro </strong></label>
<input class="form-control" value="" id="dinheiro" name="dinheiro" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>

<!-- PIX -->

<div class="col-12"> 
<input type="checkbox" id="chkPix" value='sim' name="checkpix" >
Pix
</div>

<div id="divPix"  runat="server" style="display:none">


<?php 
$sqlcp = "SELECT * from contas_bancarias cb INNER JOIN bancos b ON cb.conta_banco = b.banco_id where cb.conta_cfc = $user[user_empresa] ";
$execp = mysqli_query($conn, $sqlcp);
$totalcp =mysqli_num_rows($execp);

?>

<?php if ($totalcp == '') {?>
Cadastre uma conta para recebimento de pix
<?php } else {  ?>

<div  class="row">



<div  class="col-6">
<label> <strong>Informe o valor </strong></label>
<input class="form-control" value="" id="pix" name="pix" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>


<div class="col-6">


<label> <strong>Informe o a conta </strong></label>




<select name="contapix" id="contapix"  class="form-control" > 
  <option value="">Informe</option>

  <?php 
while($contapix = mysqli_fetch_array($execp)) {
?>
  <option value="<?php echo $contapix[conta_id] ?>">Conta: <?php echo $contapix[conta_conta] ?> Banco: <?php echo $contapix[banco_banco] ?> </option>
<?php } ?>


</select>

<?php } ?>

</div>
</div>
</div>


<!-- Credito -->

<div class="col-12"> 
<input type="checkbox" id="chkCartao" name="chkCartao" value="sim" >
Cartão de credito
</div>

<div id="divCartao"  runat="server" style="display:none">


<div  class="row">

<div  class="col-6">
<label> <strong>Informe o valor </strong></label>
<input class="form-control" value=""  id="cartao" name="credito" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>


<div class="col-6">
<label> <strong>Informe quantidade parcelas </strong></label>
<input class="form-control" value="" id="parcelascartao" name="parcelascart"   type="number"> 
</div>
</div>
</div>

<!-- Debito -->

<div class="col-12"> 
<input type="checkbox" id="chkDebito" name="scales" >
Cartão de débito
</div>

<div id="divDebito"  runat="server" style="display:none">



<div  class="col-12">
<label> <strong>Informe o valor </strong></label>
<input class="form-control" value="" id="debito" name="debito" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>

</div>


<!-- Crediario -->

<div class="col-12"> 
<input type="checkbox" id="chkCrediario" value="sim" name="checkareceber" >
Crediário
</div>

<div id="divCrediario"  runat="server" style="display:none">

<div class="row">
<div class="col-6" > 
<label> <strong>Valor a pagar</strong></label>
<input id="valor" class="form-control" name="crediario"  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>

<div class="col-6">
<label> <strong>Quantidade de Parcelas </strong></label>
<select name="parcelas" id='departamento'  class="form-control">
<option value="">Informe</option>
<?php
  $i = 1;
  $x = 0;
  $parcelas = '24';
  while ($i <= $parcelas):
   $x++;
    ?>
  <option value="<?php echo $x ?>"><?php echo $x ?></option>

  <?php  $i++;
  endwhile; ?>


</select>
</div>
<div id="resultsd"></div>

<script>
   $(document).ready(function() {
   $('#departamento').on('change', function() {
      var dados = jQuery(this).serialize();
      var id = $("#valor").val(); /// <<<<<

     $.ajax({
        url: 'parcelas_crediario_saida_fornecedor.php?id='+id,
        cache: false,
        data: dados,
        type: "POST",  
        success: function(msg){
           $("#resultsd").empty();
           $("#resultsd").append(msg);
        }
     });
      return false;
   });

});
</script>		




</div>


</div></div>



<br>
<input type="hidden" name="totalareceber" class="form-control" value="<?php echo $total2  ?>"> 
<input type="hidden" name="fornecedor" class="form-control" value="<?php echo $_POST[fornecedor] ?>"> 
<input type="hidden" name="juros" class="form-control" value="<?php echo $totalacrescimo ?>"> 
<input type="hidden" name="descontos" class="form-control" value="<?php echo $totaldescontos ?>"> 



<div id="resultsvenda"></div>
<br>
<div align="right">
<button type="submit" class="btn btn-primary">Finalizar Registro </button>
</div>



<br>
</form>
</div>
<!-- ends: .row -->
</div>
</div>

</div>

               </div>
            </div>
         </div>
         
         

      </div>
   </div>
</div>
 
</div>

</div>
<!-- ends: .row -->
</div>
</div>

</div>



<script language="javascript">

////  check box dinheiro
$('#chkDinheiro').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divDinheiro').css('display', 'block');
    }
    else {
        $("#divDinheiro").css('display', 'none');
        document.getElementById("dinheiro").value = "";

    }
});


////  check box pix
$('#chkPix').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divPix').css('display', 'block');
    }
    else {
        $("#divPix").css('display', 'none');
        document.getElementById("pix").value = "";
        document.getElementById("contapix").value = "";

    }
});

////  check box cartao
$('#chkCartao').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divCartao').css('display', 'block');
    }
    else {
        $("#divCartao").css('display', 'none');
        document.getElementById("cartao").value = "";
        document.getElementById("parcelascartao").value = "";

    }
});

////  check box debito
$('#chkDebito').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divDebito').css('display', 'block');
    }
    else {
        $("#divDebito").css('display', 'none');
        document.getElementById("debito").value = "";

    }
});

////  check box crediario
$('#chkCrediario').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divCrediario').css('display', 'block');
    }
    else {
        $("#divCrediario").css('display', 'none');
        document.getElementById("valor").value = "";
        document.getElementById("departamento").value = "";
        


    }
});


function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' deve ser preenchido.\n'; }
    } if (errors) alert('Atenção !!!\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>





<script>	
$(document).ready(function() {
 $("#finalizarvenda").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'finalizarsaidafornecedor.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#resultsvenda").empty();
      $("#resultsvenda").append(msg);
      document.getElementById("results").style.display = "block";

    }
  });
   return false;
 });
});
</script>	