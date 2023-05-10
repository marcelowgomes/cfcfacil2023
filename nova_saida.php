<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

$sql = "SELECT * from alunos WHERE aluno_id = '$id' and aluno_cfc = $user[user_empresa] ";
$sql2 = "SELECT * from receitas_despesas where receita_cfc = $user[user_empresa] and receita_ocorrencia = 'Saida' ";
$sql3 = "SELECT * from colaboradores ";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$produtos = mysqli_query($conn, $sql2);
$produto_dados = mysqli_fetch_all($produto);
$colaborador = mysqli_query($conn, $sql3);
$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
preg_match($pattern, $dados["aluno_telefones"], $matches);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
                    <h4>Nova Saída -   <?php echo ($dados['aluno_nome']) ?> </h4>
                    <div class='mt-2 d-flex'>
        <p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
        <p class='mx-2'><strong>Telefone: </strong><?php echo ($dados['aluno_t1']) ?></p>
      </div>
                 </div>  </div></div></div>

<br>





<div class="col-xxl-7 mb-25">

<div class="card border-0 px-25">
   <div class="card-header px-0 border-0">
      <h6>Itens</h6>
      
   </div>
   <div class="card-body p-0">
      <div class="tab-content">
         <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
            <div class="selling-table-wrap selling-table-wrap--source">
               <div class="table-responsive">
                  <table class="table table--default table-borderless ">
                     <thead>
                        <tr class="bg-primary">
                           <th class="text-white" >Item</th>
                           <th class="text-center text-white">Valor</th>
                           <th class="text-center text-white">QTD.</th>
                           <th class="text-center text-white ">Desconto</th>
                           <th class="text-center text-white">Acrescimo</th>
                           <th class="text-center text-white">Ação</th>
                        </tr>
                     </thead>

                     <?php
  $x='0';
  while($produto = mysqli_fetch_array($produtos)) { 
  $x++;
  
  $sql2a = "SELECT * from carrinho  where carrinho_aluno = $id and carrinho_status='1' and carrinho_cfc = $user[user_empresa] and carrinho_item = $produto[receita_id]  ";
  $exe2a = mysqli_query($conn, $sql2a);
  $totalitens2a =mysqli_num_rows($exe2a);
  $itemcarrinho = mysqli_fetch_array($exe2a)
    ?>
    <?php if($totalitens2a == '0') { ?> 
   <form id="formapagar<?php echo $x ?>" action="#" method="post" enctype="multipart/form-data">

                     <tbody>
                        <tr>
                           <td>
                            <span><?php echo $produto[receita_nome] ?></span>
                           </td>
                           <td class="text-center">
                           R$<?php echo $produto[receita_valor] ?>
                          </td>
                           <td class="text-center">
                           <input type="number" class="form-control" min="0" name="qtd" required>
                          </td>
                           <td class="text-center">
                           <input type="text" class="form-control" min="0" name="desconto" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
                           </td >
                           <td class="text-center">
                           <input type="text"  class="form-control" min="0" name="acrescimo" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
                          </td>
                           <td class="text-center"><button type="submit" class="btn btn-success btn-circle btn-sm">+</button></td>
                        </tr>
                       
                       
                        
                       
                     </tbody>

<input type="hidden" name="aluno"  value="<?php echo $id ?>"> 
<input type="hidden" name="categoria"  value="<?php echo $produto[receita_categoria] ?>"> 
<input type="hidden" name="subcategoria"  value="<?php echo $produto[receita_subcategoria] ?>"> 
<input type="hidden" name="valor"  value="<?php echo $produto[receita_valor] ?>"> 
<input type="hidden" name="custo"  value="<?php echo $produto[receita_custo] ?>"> 
<input type="hidden" name="item"  value="<?php echo $produto[receita_id] ?>"> 


  </form>
<?php } else { ?>


   <form id="formapagar<?php echo $x ?>" action="#" method="post" enctype="multipart/form-data">

<tbody>
   <tr>
      <td>
       <span><?php echo $produto[receita_nome] ?></span>
      </td>
      <td class="text-center">
      R$<?php echo $produto[receita_valor] ?>
     </td>
      <td class="text-center">
      <input type="number" class="form-control" min="0" value="<?php echo $itemcarrinho[carrinho_qtd] ?>" name="qtd" required>
     </td>
      <td class="text-center">
      <input type="text" class="form-control" min="0" value="<?php echo $itemcarrinho[carrinho_desconto] ?>" name="desconto" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
      </td >
      <td class="text-center">
      <input type="text"  class="form-control" min="0" name="acrescimo" value="<?php echo $itemcarrinho[carrinho_acrescimo] ?>" onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
     </td>
      <td class="text-center"><button type="submit" class="btn btn-success btn-circle btn-sm">+</button></td>
   </tr>
  
  
   
  
</tbody>

<input type="hidden" name="aluno"  value="<?php echo $id ?>"> 
<input type="hidden" name="categoria"  value="<?php echo $produto[receita_categoria] ?>"> 
<input type="hidden" name="subcategoria"  value="<?php echo $produto[receita_subcategoria] ?>"> 
<input type="hidden" name="valor"  value="<?php echo $produto[receita_valor] ?>"> 
<input type="hidden" name="custo"  value="<?php echo $produto[receita_custo] ?>"> 
<input type="hidden" name="item"  value="<?php echo $produto[receita_id] ?>"> 


</form>


<?php
}
?>


  <script>	

$(document).ready(function() {
 $("#formapagar<?php echo $x ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'caixa_saida.php',
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
      document.getElementById("caixa").style.display = "none";


    }
  });
   return false;
 });
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

                     <?php } ?> 


                  </table>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>

</div>






<div class="col-xxl-5 mb-25">

<div class="card border-0 px-25">
   <div class="card-header px-0 border-0">
      <h6>Caixa</h6>
      
   </div>
   <div class="card-body p-0">
      <div class="tab-content">
         <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel" aria-labelledby="t_selling-today-tab">
            <div class="selling-table-wrap">
               <div class="table-responsive">
                    </div>


                     <div id="results"></div>
                  
               </div>
            </div>
         </div>
         
         

      </div>
   </div>
</div>
 
<div id="results2"> </div>
</div>

</div>
<!-- ends: .row -->
</div>
</div>

</div>
