<?php
    include_once "bd/conexao.php";
    if(isset($_POST['atualizado'])){
        $fornecedor_nome = $_POST['nome'];
        $fornecedor_cpf = $_POST['cpf'];
        $fornecedor_telefone = $_POST['telefone'];
        $fornecedor_contato = $_POST['contato'];
        $fornecedor_cep = $_POST['cep'];
        $fornecedor_rua = $_POST['rua'];
        $fornecedor_numero = $_POST['numero'];
        $fornecedor_bairro = $_POST['bairro'];
        $fornecedor_cidade = $_POST['cidade'];
        $fornecedor_estado = $_POST['estado'];

        $sql = "UPDATE fornecedores SET fornecedor_nome = '$fornecedor_nome', fornecedor_cpf = '$fornecedor_cpf', fornecedor_telefone = '$fornecedor_telefone', fornecedor_contato = '$fornecedor_contato', fornecedor_cep = '$fornecedor_cep', fornecedor_rua = '$fornecedor_rua', fornecedor_numero = '$fornecedor_numero', fornecedor_bairro = '$fornecedor_bairro', fornecedor_cidade = '$fornecedor_cidade', fornecedor_estado = '$fornecedor_estado' WHERE fornecedor_id = '$id'";
        if(mysqli_query($conn, $sql)){
            echo("<h1>Edição de fornecedor concluida com sucesso!</h1>");
        }else{
            echo("<h1>Houve um erro na edição do fornecedor</h1><br><p>".$conn->error."</p>");
        }

        mysqli_close($conn);
    }