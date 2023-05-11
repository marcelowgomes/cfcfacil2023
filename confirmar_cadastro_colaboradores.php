<?php
include_once "bd/conexao.php";
if (isset($_POST['submit'])) {


    $nome = $_POST['nome_completo'];
    $cpf  = $_POST['cpf'];
    $pratico  = $_POST['pratico'];
    $teorico  = $_POST['teorico'];
    $administrativo  = $_POST['administrativo'];
    $sexo  = $_POST['sexo'];
    $nascimento  = $_POST['nascimento'];
    $rg  = $_POST['rg'];





    $sql = "INSERT INTO colaboradores (colaborador_nome, colaborador_cpf, colaborador_pratico, colaborador_teorico, colaborador_administrativo, colaborador_cfc,
    colaborador_usuario,  colaborador_sexo, colaborador_nascimento, colaborador_rg) 

    values ('$nome', '$cpf' ,'$pratico','$teorico','$administrativo','$user[user_empresa]' ,'$user[id_user]' ,'$sexo','$nascimento' ,'$rg')";




    if(mysqli_query($conn, $sql)){
        echo("<h1>Cadastro de colaborador realizado com sucesso!</h1>");
    }else{
        echo("<h1>Houve um erro no cadastro do colaborador!</h1><br><p>".$conn->error."</p>");
    }
}
?>
