<?php
include_once "bd/conexao.php";
if (isset($_POST['atualizado'])) {
    $cpf_colaborador = $_POST['cpf'];
    $colaborador_administrativo = $_POST['administrativo'];
    $colaborador_pratico = $_POST['pratico'];
    $colaborador_teorico = $_POST['teorico'];


    $sql = "UPDATE colaborador SET cpf_colaborador = '$cpf_colaborador', colaborador_administrativo = '$colaborador_administrativo', colaborador_pratico = '$colaborador_pratico', colaborador_teorico = '$colaborador_teorico' WHERE colaborador_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo ("<h1>Edição de Colaborador concluida com sucesso!</h1>");
    } else {
        echo ("<h1>Houve um erro na edição de Colaborador</h1><br><p>" . $conn->error . "</p>");
    }

    mysqli_close($conn);
}
