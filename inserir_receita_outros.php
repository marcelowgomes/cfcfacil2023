<?php
if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
include_once "bd/conexao.php";

$sql = "SELECT * FROM subcategoria_produtos WHERE subcat_produto_id  = '$_POST[subcategoria]'";
$exe = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($exe); 


$obs = $_POST['observacoes'];
$cat = $_POST['categoria'];
$sub = '0';
$valor = $_POST['valor'];
$inc =  $_POST['incidencia'];
$oco = $_POST['ocorrencia'];

$nome = $_POST['nome'];




$sql = "INSERT INTO receitas_despesas (receita_nome,receita_observacoes,receita_categoria, receita_subcategoria, receita_valor,receita_incidencia,
receita_ocorrencia, receita_usuario, receita_cfc,receita_fornecedor ) 
VALUES ('$nome','$obs','$cat','$sub','$valor','$inc','$oco','$user[id_user]','$user[user_empresa]','0')";
if (mysqli_query($conn, $sql)) {
?>
<script>
alert("Cadastro Realizado com Sucesso");
window.location.href = "cadastrar_receitas";

</script>

<?php


} else {
    echo ("<h1>Houve um problema ao cadastrar Receitas e despesas!</h1><br><p>" . $conn->error . "</p>");
}

