<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

/// VERIFICANDO HISTORICO DE AGENDA DO ALUNO
$sqlc = "SELECT * FROM escala_alunos WHERE escala_aluno = '$_POST[aluno]' and escala_categoria = '$_POST[cat]' and escala_status <>  '3'   ";
$exec = mysqli_query($conn, $sqlc);
$agendadas = mysqli_num_rows($exec);
mysqli_close($sqla1);


/// VERIFICANDO COMPRAS ALUNO
$sqla1 = "SELECT SUM(carrinho_qtd) AS compradas FROM carrinho WHERE carrinho_aluno = '$_POST[aluno]' and carrinho_status = '2' and carrinho_categoria = '1'  and carrinho_subcategoria = '$_POST[cat]'   ";
$exea1 = mysqli_query($conn, $sqla1);
$agendados = mysqli_num_rows($exea1);
$compradas = mysqli_fetch_array($exea1);

//echo $sqla1;

$aulas = $compradas[compradas] - $agendadas ;
if($aulas <= '0') { ?>

Aluno sem credito 

<?php
exit;}




/// VERIFICANDO SE JÁ TEM ALUNO NESSA DATA E HORARIO
$sqlv1 = "SELECT * FROM escala_alunos WHERE fk_semana = '$_POST[semana_aluno]' and dia_escala_aluno = '$_POST[dia_aluno]' and horario_inicio_escala_aluno = '$_POST[horario_inicio]' and horario_fim_escala_aluno = '$_POST[horario_fim]' and escala_veiculo  = '$_POST[veiculo]'  and escala_status <>  '3'    ";
$exev1 = mysqli_query($conn, $sqlv1);
$v1 = mysqli_num_rows($exev1);

if($v1 > '0' ) {
?>
<div class="alert alert-danger" role="alert">
Não disponivel</div>

<?php
exit; }


@$conn->query($insert = "INSERT INTO escala_alunos (fk_semana, dia_escala_aluno, horario_inicio_escala_aluno, nome_escala_aluno ,
horario_fim_escala_aluno,escala_aluno, escala_data_aula,escala_veiculo,escala_instrutor,escala_usuario, escala_cfc, escala_escala, escala_categoria) VALUES ('$_POST[semana_aluno]','$_POST[dia_aluno]', 
'$_POST[horario_inicio]','$_POST[aluno]','$_POST[horario_fim]','$_POST[aluno]','$_POST[data_aluno]','$_POST[veiculo]','$_POST[instrutor]','$user[id_user]','$user[user_empresa]','$_POST[escala]','$_POST[cat]')");

$idnovo = mysqli_insert_id($conn);



$partes2 = explode(' ',$_POST[nome]);
$primeiroNome = array_shift($partes2);
$ultimoNome = array_pop($partes2);


?>  <div id="results2<?php echo $_POST[modal] ?>" style="display:block"></div>   


<div id="aberto<?php echo $_POST[modal] ?>" style="display:block">

<?php  echo $primeiroNome. '<br> ' .$ultimoNome; ""
?> <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#modal-acoes<?php echo $_POST[modal] ?>"></i> 









<!-- INICIO MODAL ACOES  -->

<div class="modal-basic modal fade show" id="modal-acoes<?php echo $_POST[modal] ?>" tabindex="-1" role="dialog" aria-hidden="true">


<form id="editar<?php echo $_POST[modal] ?>" method="post">

<!-- CONECTANDO AOS DADOS DO AGENDAMENTO -->


<?php

$sqlea = "SELECT * from escala_alunos WHERE id_escala_aluno = '$idnovo'";
$alunoea = mysqli_query($conn, $sqlea);
$dadosea = mysqli_fetch_array($alunoea);
mysqli_close($sqlea);

$sqleaa = "SELECT * from alunos WHERE aluno_id = '$dadosea[escala_aluno]'";
$alunoeaa = mysqli_query($conn, $sqleaa);
$dadoseaa = mysqli_fetch_array($alunoeaa);
mysqli_close($sqleaa);

$partes2 = explode(' ',$dadoseaa[aluno_nome]);
$primeiroNome = array_shift($partes2);
$ultimoNome = array_pop($partes2);


$sqlin= "SELECT * from colaboradores WHERE id = '$dadosea[escala_instrutor]'";
$instrutorin = mysqli_query($conn, $sqlin);
$instrutor = mysqli_fetch_array($instrutorin);
mysqli_close($sqlin);
?>

<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Ações</h6>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <img src="img/svg/x.svg" alt="x" class="svg">
         </button>
      </div>
      <div class="modal-body">
         <p>
            <strong> Aluno:  </strong><?php echo $dadoseaa[aluno_nome] ?><br>
            <strong> Veiculo:  </strong><?php echo $veiculo[marca_veiculo] ?> <?php echo $veiculo[modelo_veiculo] ?> <?php echo $veiculo[cor_veiculo] ?> Placa: <?php echo $veiculo[placa_veiculo] ?><br>
            <strong> Instrutor:  </strong> <?php echo $instrutor[nome] ?><br>
            <strong> Dia da aula:  </strong> <?php echo date('d/m/Y', strtotime($dadosea[escala_data_aula])); ?>  <strong> Horario: </strong>  <?php echo $dadosea[horario_inicio_escala_aluno] ?>  às <?php echo $dadosea[horario_fim_escala_aluno] ?>   <br>
           
           
        
<br>


<label for="countryOption" class="il-gray fs-14 fw-500 align-center mb-10"><strong>Ações</strong></label> <br><br>


<input type="checkbox" id="chkCancelar2<?php echo $_POST[modal] ?>" name="scales" >
Cancelar Agendamento


<div id="divCancelar2<?php echo $_POST[modal] ?>"  runat="server" style="display:none">


<?php 

echo "<SELECT NAME='motivo' SIZE='1' required class='form-control'>

<OPTION VALUE='' SELECTED> Informe o motivo ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM motivos_ajustes_agenda where motivo_ajuste_aula_status = '1'";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['motivo_ajuste_aula_id']."' ";
echo ">".$linha['motivo_ajuste_aula_motivo'];
}
echo "</SELECT>";
?>

<br>
<input type="text" class="form-control"  required name="justificativa" placeholder="Informe uma Justificativa">
<br>
</div>
<?php

echo '<input type="hidden" name="horario_inicio" value="' . date('H:i', $horario_inicio) . '">
<input type="hidden" name="horario_fim" value="' . date('H:i', $horario_fim) . '">
<input type="hidden" name="semana_aluno" value="' . $semana . '">
<input type="hidden" name="dia_aluno" value="' . $j . '">
<input type="hidden" name="data_aluno" id="'.$j . '">
<input type="hidden" name="aluno" value="'.$_GET[id] . '">
<input type="hidden" name="modal" value="'.$_POST[modal]. '">
<input type="hidden" name="agendamento" value="'.$dadosea[id_escala_aluno]. '">


<div id="caixa'.$_POST[modal].'" style="display:block" >'

?>
      
      <div class="modal-footer">


      <button type="submit" id="btn2<?php echo $_POST[modal] ?>" disabled class="btn btn-success btn-outlined btn-sm" data-bs-dismiss="modal">Salvar</button>
                   
         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</div>
</div>
</form>
<!-- FIM  MODAL ACOES  -->



<script>

////  check box debito
$('#chkCancelar2<?php echo $_POST[modal] ?>').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divCancelar2<?php echo $_POST[modal] ?>').css('display', 'block');
        $('#btn2<?php echo $_POST[modal] ?>').attr('disabled', false);

    }
    else {
        $("#divCancelar2<?php echo $_POST[modal] ?>").css('display', 'none');
        $('#btn2<?php echo $_POST[modal] ?>').attr('disabled', true);



    }
});



$(document).ready(function() {
 $("#editar<?php echo $_POST[modal] ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'editaragenda.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results2<?php echo $_POST[modal] ?>").empty();
      $("#results2<?php echo $_POST[modal] ?>").append(msg);
      document.getElementById("aberto<?php echo $_POST[modal] ?>").style.display = "none";


    }
  });
   return false;
 });
});

</script>	
</div>