<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

/// VERIFICANDO HISTORICO DE AGENDA DO ALUNO
$sqlc = "SELECT * FROM escala_alunos WHERE escala_aluno = '$_POST[aluno]' and escala_categoria = '$_POST[cat]'   ";
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
$sqlv1 = "SELECT * FROM escala_alunos WHERE fk_semana = '$_POST[semana_aluno]' and dia_escala_aluno = '$_POST[dia_aluno]' and horario_inicio_escala_aluno = '$_POST[horario_inicio]' and horario_fim_escala_aluno = '$_POST[horario_fim]' and escala_veiculo  = '$_POST[veiculo]'    ";
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


$partes2 = explode(' ',$_POST[nome]);
$primeiroNome = array_shift($partes2);
$ultimoNome = array_pop($partes2);
echo $primeiroNome. '<br> ' .$ultimoNome; 
?>