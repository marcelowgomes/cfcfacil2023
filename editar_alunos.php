<?php

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
include_once "bd/conexao.php";
if (isset($_POST['atualizado'])) {
    $aluno_nome = $_POST['nome'];
    $aluno_cpf = $_POST['cpf'];
    $aluno_categoria_pretendida = $_POST['categoria'];
    $aluno_status = $_POST['status'];

    $sql = "UPDATE alunos SET aluno_nome = '$aluno_nome', aluno_cpf = '$aluno_cpf', aluno_categoria_pretendida = '$aluno_categoria_pretendida', aluno_status = '$aluno_status'  WHERE aluno_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo ("<h1>Edição de Aluno concluida com sucesso!</h1>");
    } else {    
        echo ("<h1>Houve um erro na edição de Colaborador</h1>");
    }

    mysqli_close($conn);
}
