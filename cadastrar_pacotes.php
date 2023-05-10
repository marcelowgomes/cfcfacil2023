<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>




<style>

a.link {
    display: block;
    text-decoration: none;
}


</style>
 

               <div>
                 
                     <div>
                        <h4>Cadastro de pacotes</h4>
                       
                     </div>  </div></div>


                     
                     <BR>


                     <form action="inserir_pacote" method="POST">


                     <div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
<div id="div-content" class="ap-po-details   radius-xl ">

<label> <strong> Categoria </strong></label>

<div class="row">


<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locmoto" name="subcategoria" value="1" required >
<label for="locmoto">&nbsp;  <i class="fa fa-motorcycle" aria-hidden="true"></i> Moto
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="loccar" name="subcategoria" value="2" required >
     <label for="loccar"> &nbsp; <i class="fa fa-car" aria-hidden="true"></i> Carro
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locca" name="subcategoria" value="3" required >
     <label for="locca">  &nbsp; <i class="fa fa-truck" aria-hidden="true"></i> Caminhão
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locbus" name="subcategoria" value="4" required >
     <label for="locbus">  &nbsp; <i class="fas fa-bus-alt" aria-hidden="true"></i> Ônibus
</label>
</div>



<div class="col-4 btn btn-outline-warning m-1">
<input type="radio" id="locarreta" name="subcategoria" value="5" required >
     <label for="locarreta"> &nbsp; <i class="fas fa-truck-moving" aria-hidden="true"></i> Carreta
</label>
</div>

<div class="col-4 btn btn-outline-warning m-1">

<input type="radio" id="locciclo" name="subcategoria" value="6" required >
     <label for="locciclo">&nbsp;  <i class="la la-motorcycle"></i> Ciclomotor 
</label>
</div>

<div class="col-4 btn btn-outline-warning m-1">

<input type="radio" id="simu" name="subcategoria" value="99" required >
     <label for="simu">&nbsp;  <i class="fa fa-motorcycle" aria-hidden="true"></i> + <i class="fa fa-car" aria-hidden="true"></i> Simultânea 
</label>
</div>
</div>

<div class="row">

<div class="col-6">
<label> <strong>Descrição</strong></label>
<input type="text" name="descricao" class="form-control">
</div>

<div class="col-6">
<label> <strong>Valor de Venda</strong></label>
<input type="text" class="form-control" name="valor"  required onKeyPress="return(MascaraMoeda(this,'','.',event))"> 

</div>
</div>
<br>
<button type="submit" class="btn btn-success btn-sm">Cadastrar</button>

</div>
</div>
</div>
</div>


</form>

<div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
<div id="div-content" class="ap-po-details   radius-xl ">

<strong> Pacotes Cadastrados </strong> <br><br>


<div class="row"> 

<div class="col-6"> <strong> Titulo </strong> </div>
<div class="col-2"><strong>  Valor  </strong></div>
<div class="col-2"><strong>  Disponível </strong> </div>
<div class="col-2"><strong>  Ações </strong> </div>

<?php
$sql = "SELECT * FROM pacotes p INNER JOIN subcategoria_produtos s on p.pacote_categoria = s.subcat_produto_id WHERE p.pacote_cfc = '$user[user_empresa]'";
$exe = mysqli_query($conn, $sql);
while($pacote = mysqli_fetch_array($exe)) {

?>
<div class="col-6">  Pacote <?php echo $pacote[subcat_produto_nome] ?> - <?php echo $pacote[pacote_descricao] ?> </div>
<div class="col-2"> R$ <?php echo $pacote[pacote_valor] ?>  </div>
<div class="col-2"> <?php if($pacote[pacote_status] == '1' ) { ?> <span class="badge badge-round badge-success badge-lg">Sim</span>
 <?php } else { ?> <span class="badge badge-round badge-danger badge-lg">Não</span> <?php } ?>  </div>
<div class="col-2">  <a href="add_itens_pacote/<?php echo $pacote[pacote_id] ?>"> <span class="badge badge-round badge-info badge-lg">Add Itens</span> </a> <a href="editar_pacote/<?php echo $pacote[pacote_id] ?>">  <span class="badge badge-round badge-warning badge-lg">Editar</span> </a> </div>

<?php } ?>




</div>


</div>
</div>
</div>
</div>



<script>

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
