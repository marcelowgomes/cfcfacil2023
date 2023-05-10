<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

$total2a = $pacote['pacote_valor']; 

?>  


<?php
$sql2 = "SELECT * from itens_pacote where itens_p_cfc = $user[user_empresa] and itens_p_pacote = '$id2' ";
$produtos = mysqli_query($conn, $sql2);
while($produto = mysqli_fetch_array($produtos)) { 

$sql2p = "SELECT * from receitas_despesas  where receita_id = $produto[itens_p_produto] and receita_cfc = $user[user_empresa]   ";
$exe2p = mysqli_query($conn, $sql2p);
$itemcarrinho = mysqli_fetch_array($exe2p)
?>


<input type="hidden" name="aluno2"  value="<?php echo $id ?>"> 
<input type="hidden" name="categoria[]"  value="<?php echo $itemcarrinho[receita_categoria] ?>"> 
<input type="hidden" name="subcategoria[]"  value="<?php echo $itemcarrinho[receita_subcategoria] ?>"> 
<input type="hidden" name="valor"  value="0.00"> 
<input type="hidden" name="produto[]"  value="<?php echo $produto[itens_p_produto] ?>"> 
<input type="hidden" name="pacote"  value="<?php echo $id2 ?>"> 
<input type="hidden" name="qtd[]"  value="<?php echo $produto[itens_p_qtd] ?>"> 

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

<div class="col-23"> 
Total
</div>
<div class="col-23"> 
<input class="form-control" name="total" value="<?php echo $total2a  ?>"> 
</div>

<div class="col-12"> 
Descontos
</div>
<div class="col-12"> 
<input class="form-control"  name="desconto" value="<?php echo number_format($totaldescontos, 2, '.', '.');  ?>"> 
</div>



</div>

               <br>


               <table class="table table--success table-borderless ">
<thead >
                        <tr class="bg-success text-white">
                           <th><strong class="text-white">Formas de Recebimento</strong></th>
                           
                        </tr>
                     </thead>



</table>

<div class="row"> 
<!-- DINHEIRO -->

<div class="col-12"> 
<input type="checkbox" id="chkDinheiro" name="scales" >
Dinheiro
</div>
<div id="divDinheiro" name="dinheiro" class="col-12" runat="server" style="display:none"><label> <strong>Informe o valor recebido em dinheiro </strong></label>
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
<label> <strong>Informe o valor 3</strong></label>
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
<label> <strong>Valor a receber</strong></label>
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


<script>
   $(document).ready(function() {
   $('#departamento').on('change', function() {
      var dados = jQuery(this).serialize();
      var id = $("#valor").val(); /// <<<<<

     $.ajax({
        url: 'parcelas_crediario_pacote.php?id='+id,
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



<br><div id="resultsd"></div>



<div id="resultsvenda"></div>
<br>
<div align="right">
<button type="submit" class="btn btn-primary">Finalizar Venda </button>
</div>


<br>

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
    url: 'finalizarvendapacote.php',
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


