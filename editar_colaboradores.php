<?php
if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
include_once "bd/conexao.php";
if (isset($_POST['atualizado'])) {
    $colaborador_cpf = $_POST['cpf'];
    $colaborador_nome = $_POST['nome'];
    $colaborador_rg = $_POST['rg'];

    $sql = "UPDATE colaboradores SET colaborador_cpf = '$colaborador_cpf', colaborador_nome = '$colaborador_nome', colaborador_rg = '$colaborador_rg' WHERE colaborador_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo ("<h1>Edição de Colaborador concluida com sucesso!</h1>");
    } else {    
        echo ("<h1>Houve um erro na edição de Colaborador</h1><br><p>" . $conn->error . "</p>");
    }

    mysqli_close($conn);
}
