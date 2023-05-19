<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>

<?php /// ALUNOS
$sql = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]'";
$exe = mysqli_query($conn, $sql);
?>


<style>

a.link {
    display: block;
    text-decoration: none;
}


</style>
 

               <div>
                 
                     <div>
                        <h4>Cadastro receitas e despesas</h4>
                       
                     </div>  </div></div>

                     <BR>

                    



                     <div class="col-12 mb-25">
                     <!-- Card 1  -->
                     <div class="ap-po-details ap-po-details--3 radius-xl d-flex py-25">


                     <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-aulas">
       
                        <div  id="divlink"  class="overview-content overview-content3 b-none bg-none">
                           <div class="d-flex">
                              <div class="revenue-chart-box__Icon me-20 bg-primary color-white rounded-circle">
                              <i class="fa fa-car" aria-hidden="true"></i>


                              </div>
                              <div class="d-flex align-items-start flex-wrap">
                                 <div class="me-10">
                                    <h1>Aulas</h2>
                                       <p class="mt-1 mb-0"><i class="las la-plus"></i> Cadastrar</p>
                                 </div>

                                 
                              </div>
                           </div>
                        </div>

                        </a>



                        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-cursos">

                        <div id="divlink"  class="overview-content overview-content3 bg-none b-none">
                           <div class="d-flex">
                              <div class="revenue-chart-box__Icon me-20 bg-info color-white rounded-circle">
                              <i class="fa fa-address-book" aria-hidden="true"></i>

                              </div>
                              <div class="d-flex align-items-start flex-wrap">
                                 <div class="me-10">
                                    <h1>Cursos</h1>
                                    <p class="mt-1 mb-0"><i class="las la-plus"></i> Cadastrar</p>
                                 </div>

                                 
                              </div>
                           </div>
                        </div>

                        </a>


                        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-loca">


                        <div id="divlink"  class="overview-content overview-content3 bg-none b-none">
                           <div class="d-flex">
                              <div class="revenue-chart-box__Icon me-20 bg-warning color-white rounded-circle">
                              <i class="fa fa-retweet" aria-hidden="true"></i>
                              </div>
                              <div class="d-flex align-items-start flex-wrap">
                                 <div class="me-10">
                                    <h1>Locação</h1>
                                    <p class="mt-1 mb-0"><i class="las la-plus"></i> Cadastrar</p>
                                 </div>

                                 
                              </div>
                           </div>
                        </div>

                        </a>

     
                        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-taxas">

                        <div  class="overview-content overview-content3 bg-none b-none"  id="divlink" >
                           <div class="d-flex">
                              <div class="revenue-chart-box__Icon me-20 bg-success color-white rounded-circle">
                              <i class="uil uil-usd-circle"></i>
                              </div>
                              <div class="d-flex align-items-start flex-wrap">
                                 <div class="me-10">
                                    <h1>Taxas</h1>
                                    <p class="mt-1 mb-0"><i class="las la-plus"></i> Cadastrar</p>
                                 </div>

                                
                              </div>
                           </div>
                        </div>
                        </a>





                        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-outras">



                        <div class="overview-content overview-content3 bg-none b-none" id="divlink">
                           <div class="d-flex">
                              <div class="revenue-chart-box__Icon me-20 bg-secondary color-white rounded-circle">
                              <i class="fa fa-certificate" aria-hidden="true"></i>
                              </div>
                              <div class="d-flex align-items-start flex-wrap">
                                 <div class="me-10">
                                    <h1>Outras</h1>
                                    <p class="mt-1 mb-0"><i class="las la-plus"></i> Cadastrar</p>
                                 </div>

                                 
                              </div>
                           </div>
                        </div>

                     </div>
                     <!-- Card 1 End  -->
                  </div>

</a>


<!-- INICIO MODAL OUTRAS  -->

<div class="modal-basic modal fade show" id="modal-outras" tabindex="-1" role="dialog" aria-hidden="true">
   <form method="post" action="inserir_receita_outros">
<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Outros Cadastros</h6>
         
      </div>
      <div class="modal-body">
<label> <strong> Informe primeiro a Ocorrência Caixa:  </strong> </label>
<div class="row">


<div class="col-3 btn btn-outline-success m-1">
<input type="radio" id="entrada" name="ocorrencia" value="Entrada" required >
<label for="entrada">&nbsp;  <i class="fa fa-plus" aria-hidden="true"></i> Entrada
</label>
</div>

<div class="col-3 btn btn-outline-danger m-1">
<input type="radio" id="saida" name="ocorrencia" value="Saida" required >
     <label for="saida"> &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Saída
</label>
</div>

</div>






<div class="row">
<label> <strong> Informe agora a Incidência  </strong> </label>

<div class="col-4 btn btn-outline-secondary m-1">
<input type="radio" id="aluno" name="incidencia" value="Aluno" required >
     <label for="aluno"> &nbsp; Aluno
</label>
</div>

<div class="col-4 btn btn-outline-secondary m-1">

<input type="radio" id="fornecedor" name="incidencia" value="Fornecedor" required >
     <label for="fornecedor">&nbsp;   Fornecedor 
</label>
</div>

<div class="col-4 btn btn-outline-secondary m-1">

<input type="radio" id="Colaborador" name="incidencia" value="Colaborador" required >
     <label for="Colaborador">&nbsp;   Colaborador 
</label>
</div>

<div class="col-4 btn btn-outline-secondary m-1">

<input type="radio" id="Veiculo" name="incidencia" value="Veiculo" required >
     <label for="Veiculo">&nbsp;   Veiculos 
</label>
</div>

</div>


<div class="row">

<div class="col-12">
<label> <strong> Nome do item</strong> </label>
<input type="text" class="form-control" name="nome" required > 
</div>
<div class="col-12">
<label> <strong> Valor</strong> </label>
<input type="text" class="form-control" name="valor" required  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>



<div class="col-12">
<label> <strong>  Observações </strong> </label>
<input type="text" class="form-control" name="observacoes" maxlength="20"> 
</div>
<input type="hidden"  name="categoria" value="4"> 




</div>
       
      </div>



      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</form>
</div>

                   <!-- FIM MODAL OUTRAS  -->





<!-- INICIO MODAL LOCACAO  -->

<div class="modal-basic modal fade show" id="modal-loca" tabindex="-1" role="dialog" aria-hidden="true">
   <form method="post" action="inserir_receita_locacao">
<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Cadastrar Locações</h6>
         
      </div>
      <div class="modal-body">
<label> <strong> Informe primeito o tipo de locação </strong> </label>
<div class="row">


<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locmoto" name="subcategoria" value="7" required >
<label for="locmoto">&nbsp;  <i class="fa fa-motorcycle" aria-hidden="true"></i> Moto
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="loccar" name="subcategoria" value="8" required >
     <label for="loccar"> &nbsp; <i class="fa fa-car" aria-hidden="true"></i> Carro
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locca" name="subcategoria" value="9" required >
     <label for="locca">  &nbsp; <i class="fa fa-truck" aria-hidden="true"></i> Caminhão
</label>
</div>

<div class="col-3 btn btn-outline-warning m-1">
<input type="radio" id="locbus" name="subcategoria" value="10" required >
     <label for="locbus">  &nbsp; <i class="fas fa-bus-alt" aria-hidden="true"></i> Ônibus
</label>
</div>

</div>






<div class="row">

<div class="col-4 btn btn-outline-warning m-1">
<input type="radio" id="locarreta" name="subcategoria" value="11" required >
     <label for="locarreta"> &nbsp; <i class="fas fa-truck-moving" aria-hidden="true"></i> Carreta
</label>
</div>

<div class="col-4 btn btn-outline-warning m-1">

<input type="radio" id="locciclo" name="subcategoria" value="12" required >
     <label for="locciclo">&nbsp;  <i class="la la-motorcycle"></i> Ciclomotor 
</label>
</div>


</div>


<div class="row">
<div class="col-12">
<label> <strong> Valor de Venda</strong> </label>
<input type="text" class="form-control" name="valor" required  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>



<div class="col-12">
<label> <strong>  Observações </strong> </label>
<input type="text" class="form-control" name="observacoes" maxlength="20"> 
</div>
<input type="hidden"  name="categoria" value="3"> 




</div>
       
      </div>



      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</form>
</div>

                   <!-- FIM MODAL LOCACAO  -->





<!-- INICIO MODAL TAXAS  -->

<div class="modal-basic modal fade show" id="modal-taxas" tabindex="-1" role="dialog" aria-hidden="true">
   <form method="post" action="inserir_receita_taxas">
<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Cadastrar Taxas</h6>
         
      </div>
      <div class="modal-body">
<label> <strong> Informe primeito o tipo de taxa </strong> </label>
<div class="row">

<div class="col-3 btn btn-outline-success m-1">
<input type="radio" id="txdirecao" name="subcategoria" value="15" required >
<label for="txdirecao">&nbsp; Direção
</label>
</div>

<div class="col-3 btn btn-outline-success m-1">
<input type="radio" id="txinicial" name="subcategoria" value="16" required >
     <label for="txinicial"> &nbsp;  Inicial
</label>
</div>

<div class="col-3 btn btn-outline-success m-1">
<input type="radio" id="txim" name="subcategoria" value="17" required >
     <label for="txim">  &nbsp;  Inclusão/Mudança
</label>
</div>

<div class="col-3 btn btn-outline-success m-1">
<input type="radio" id="txle" name="subcategoria" value="18" required >
     <label for="txle">  &nbsp; Legislação
</label>
</div>

</div>






<div class="row">

<div class="col-4 btn btn-outline-success m-1">
<input type="radio" id="txladv" name="subcategoria" value="19" required >
     <label for="txladv"> &nbsp;  LADV
</label>
</div>

<div class="col-4 btn btn-outline-success m-1">

<input type="radio" id="txre" name="subcategoria" value="20" required >
     <label for="txre">&nbsp;  Reinicio 
</label>
</div>


</div>


<div class="row">
<div class="col-12">
<label> <strong> Valor de Venda</strong> </label>
<input type="text" class="form-control" name="valor" required  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>



<div class="col-12">
<label> <strong>  Observações </strong> </label>
<input type="text" class="form-control" name="observacoes" maxlength="20"> 
</div>
<input type="hidden"  name="categoria" value="5"> 




</div>
       
      </div>



      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</form>
</div>

                   <!-- FIM MODAL TAXAS  -->







                  <!-- INICIO MODAL AULAS  -->

                  <div class="modal-basic modal fade show" id="modal-aulas" tabindex="-1" role="dialog" aria-hidden="true">
                  <form method="post" action="inserir_receita_aulas">

<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Cadastrar Aulas</h6>
         
      </div>
      <div class="modal-body">
<label> <strong> Informe primeito o tipo de aula </strong> </label>
<div class="row">

<div class="col-3 btn btn-outline-primary m-1">
<input type="radio" id="moto" name="subcategoria" value="1" required >
<label for="moto">&nbsp;  <i class="fa fa-motorcycle" aria-hidden="true"></i> Moto
</label>
</div>

<div class="col-3 btn btn-outline-primary m-1">
<input type="radio" id="carro" name="subcategoria" value="2" required >
     <label for="carro"> &nbsp; <i class="fa fa-car" aria-hidden="true"></i> Carro
</label>
</div>

<div class="col-3 btn btn-outline-primary m-1">
<input type="radio" id="caminhao" name="subcategoria" value="3" required >
     <label for="caminhao">  &nbsp; <i class="fa fa-truck" aria-hidden="true"></i> Caminhão
</label>
</div>

<div class="col-3 btn btn-outline-primary m-1">
<input type="radio" id="onibus" name="subcategoria" value="4" required >
     <label for="onibus">  &nbsp; <i class="fas fa-bus-alt" aria-hidden="true"></i> Ônibus
</label>
</div>

</div>






<div class="row">

<div class="col-4 btn btn-outline-primary m-1">
<input type="radio" id="carreta" name="subcategoria" value="5" required >
     <label for="carreta"> &nbsp; <i class="fas fa-truck-moving" aria-hidden="true"></i> Carreta
</label>
</div>

<div class="col-4 btn btn-outline-primary m-1">

<input type="radio" id="ciclomotor" name="subcategoria" value="6" required >
     <label for="ciclimotor">&nbsp;  <i class="la la-motorcycle"></i> Ciclomotor 
</label>
</div>

<div class="col-4 btn btn-outline-primary m-1">

<input type="radio" id="simulador" name="subcategoria" value="13" required >
     <label for="simulador"> &nbsp; <i class="fa fa-desktop" aria-hidden="true"></i> Simulador 
</label>
</div>

</div>


<div class="row">
<div class="col-12">
<label> <strong> Valor de Venda</strong> </label>
<input type="text" class="form-control" name="valor" required  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>



<div class="col-12">
<label> <strong>  Observações </strong> </label>
<input type="text" class="form-control" name="observacoes" maxlength="20"> 
</div>
<input type="hidden"  name="categoria" value="1"> 




</div>
       
      </div>



      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</form>
</div>

                   <!-- FIM MODAL AULAS  -->





  <!-- INICIO MODAL CURSOS  -->

  <div class="modal-basic modal fade show" id="modal-cursos" tabindex="-1" role="dialog" aria-hidden="true">

<form method="post" action="inserir_receita_cursos">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content modal-bg-white ">
<div class="modal-header">



<h6 class="modal-title">Cadastrar Cursos</h6>

</div>
<div class="modal-body">
<label> <strong> Informe primeito o tipo de curso </strong> </label>
<div class="row">

<div class="col-3 btn btn-outline-info m-1 table-selection">
<input type="radio" id="legislacao" name="subcategoria" value="21" required >
<label for="legislacao">&nbsp;  <i class="fa fa-list" aria-hidden="true"></i> Legislação
</label>
</div>

<div class="col-3 btn btn-outline-info m-1 table-selection">
<input type="radio" id="outros" name="subcategoria" value="22" required >
<label for="outros"> &nbsp; <i class="fa fa-certificate" aria-hidden="true"></i> Outros
</label>



</div>

</div>

<div id="campos" class="col-12">
<label> <strong> Informe o nome do curso</strong> </label>

<input type="text" class="form-control" name="nomecurso"> 

</div>


<div class="row " >
<div class="col-12">
<label> <strong> Valor de Venda</strong> </label>
<input type="text" class="form-control" name="valor" required  onKeyPress="return(MascaraMoeda(this,'','.',event))"> 
</div>



<div class="col-12">
<label> <strong>  Observações </strong> </label>
<input type="text" class="form-control" name="observacoes" maxlength="20"> 
</div>
<input type="hidden"  name="categoria" value="2"> 


</div>

</div>



<div class="modal-footer">
<button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
</div>
</div>
</div>

</form>

</div>
 <!-- FIM MODAL CURSOS  -->




   



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



 <script language="javascript">

$("#campos").hide();
$('div.table-selection').click(function() {
   
    // busca o radio dentro da div clicada e pega o value
    var selection = $(":radio", this).val();
    // console.log(selection); 
    if(selection != "22"){
        $("#campos").hide();
    }else{
        $("#campos").show('fast');
    }
   
   $('div').removeClass('success').find('input').prop('checked', false);
   $(this).addClass('success').find('input').prop('checked', true);
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
