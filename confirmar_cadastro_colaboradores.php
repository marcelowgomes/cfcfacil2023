<?php
include_once "bd/conexao.php";
if (isset($_POST['submit'])) {
    $nome = $_POST['nome_completo'];
    $cpf  = $_POST['cpf'];
    $identidade = $_POST['identidade'];
    $datanascimento = $_POST['data_nascimento'];
    $naturalestado = $_POST['natural_estado'];
    $natural2 = $_POST['natural_cidade'];
    $mae = $_POST['filiacao_mae'];
    $ctps = $_POST['ctps'];
    $vencexamesaude = $_POST['exame_saude'];
    $contrato = $_POST['data_contrato'];
    $recisao = $_POST['recisao'];
    $carteiramotorista = $_POST['carteira_habilitacao'];
    $vencimentocnh = $_POST['vencimento_carteira'];
    $registrodetran = $_POST['registro_detran'];
    $registrovencimento = $_POST['vencimento_registro'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['telefone_celular'];
    $email = $_POST['email'];
    $administrativo = $_POST['liberar_acesso'];
    $login = $_POST['login_acesso'];
    $senha = $_POST['senha'];
    $aulasimulador = $_POST['simulador'];
    $aulamoto = $_POST['moto'];
    $aulacaminhao = $_POST['caminhao'];
    $aulacarreta = $_POST['carreta'];
    $aulaonibus = $_POST['onibus'];
    $aprovadomoto = $_POST['aprovado_moto'];
    $reprovadomoto = $_POST['reprovado_moto'];
    $aprovadocarro = $_POST['aprovado_carro'];
    $reprovadocarro = $_POST['reprovado_carro'];
    $aprovadocaminhao = $_POST['aprovado_caminhao'];
    $reprovadocaminhao = $_POST['reprovado_caminhao'];
    $aprovadocarreta = $_POST['aprovado_carreta'];
    $reprovadocarreta = $_POST['reprovado_carreta'];
    $aprovadoonibus = $_POST['aprovado_onibus'];
    $reprovadoonibus = $_POST['reprovado_onibus'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO colaboradores (nome, cpf, identidade, datanascimento, naturalestado, natural2, 
    mae, ctps, vencexamesaude, contrato, recisao, carteiramotorista, vencimentocnh, registrodetran, registrovencimento,
    cep, rua, numero, complemento, bairro, cidade, estado, telefone, celular, email, administrativo, login, senha, aulasimulador,
    aulamoto, aulacaminhao, aulacarreta, aulaonibus, aprovadomoto, reprovadomoto, aprovadocarro, reprovadocarro, aprovadocaminhao,
    reprovadocaminhao, aprovadocarreta, reprovadocarreta, aprovadoonibus, reprovadoonibus, observacoes) values ('$nome', '$cpf', '$identidade', '$datanascimento', '$naturalestado', '$natural2', 
    '$mae', '$ctps', '$vencexamesaude', '$contrato', '$recisao', '$carteiramotorista', '$vencimentocnh', '$registrodetran', '$registrovencimento',
    '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$telefone', '$celular', '$email', '$administrativo', '$login', '$senha', '$aulasimulador',
    '$aulamoto', '$aulacaminhao', '$aulacarreta', '$aulaonibus', '$aprovadomoto', '$reprovadomoto', '$aprovadocarro', '$reprovadocarro', '$aprovadocaminhao',
    '$reprovadocaminhao', '$aprovadocarreta', '$reprovadocarreta', '$aprovadoonibus', '$reprovadoonibus', '$observacoes')
    ";
    if(mysqli_query($conn, $sql)){
        echo("<h1>Cadastro de colaborador realizado com sucesso!</h1>");
    }else{
        echo("<h1>Houve um erro no cadastro do colaborador!</h1><br><p>".$conn->error."</p>");
    }
}
