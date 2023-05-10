<?php
    if(isset($_POST['submit'])){
        $fornecedor_nome = $_POST['nome'];
        $fornecedor_cpf = $_POST['cpf/cnpj'];
        $fornecedor_telefone = $_POST['telefone'];
        $fornecedor_contato = $_POST['contato'];
        $fornecedor_cep = $_POST['cep'];
        $fornecedor_rua = $_POST['rua'];
        $fornecedor_numero = $_POST['numero'];
        $fornecedor_bairro = $_POST['bairro'];
        $fornecedor_cidade = $_POST['cidade'];
        $fornecedor_estado = $_POST['estado'];

        $sql = "INSERT INTO fornecedores (fornecedor_nome, fornecedor_cpf, fornecedor_telefone, fornecedor_contato, fornecedor_cep, fornecedor_rua, fornecedor_numero, fornecedor_bairro, fornecedor_cidade, fornecedor_estado) VALUES ('$fornecedor_nome', '$fornecedor_cpf', '$fornecedor_telefone', '$fornecedor_contato', '$fornecedor_cep', '$fornecedor_rua', '$fornecedor_numero', '$fornecedor_bairro', '$fornecedor_cidade', '$fornecedor_estado')";
        if (mysqli_query($conn, $sql)) {
            echo ("<h2>Fornecedor cadastrado com sucesso!</h2>");
        } else {
            echo ("<h2>Houve um problema no cadastro do fornecedor!</h2><br><p>" . $conn->error . "</p>");
        }
    }