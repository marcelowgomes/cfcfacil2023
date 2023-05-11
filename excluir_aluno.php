<?php
if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

$sql = "UPDATE alunos SET aluno_lixeira = '2' WHERE aluno_id = '$id'";
if (mysqli_query($conn, $sql)) {
    echo ("<h1>Exclusão de Aluno concluida com sucesso!</h1>");
}else{
    echo ("<h1>Houve um erro na exclusão de Aluno</h1>");
}