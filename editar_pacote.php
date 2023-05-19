<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

?>
<?php


if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
include_once "bd/conexao.php";
if (isset($_POST['atualizado'])) {
    $pacote_descricao = $_POST['descricao'];
    $pacote_valor = $_POST['valor'];
    $pacote_status = $_POST['status'];

    $sql = "UPDATE pacotes SET pacote_descricao = '$pacote_descricao', pacote_valor = '$pacote_valor', pacote_status = '$pacote_status'  WHERE pacote_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo ("<h1>Edição de Pacote concluida com sucesso!</h1>");
    } else {    
        echo ("<h1>Houve um erro na edição de Pacote</h1>");
    }

    mysqli_close($conn);
}
