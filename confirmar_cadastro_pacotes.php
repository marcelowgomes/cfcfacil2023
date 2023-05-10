<?php
include_once 'bd/conexao.php';

$titulo_pacote = $_POST['titulo'];
$valor_pacote = $_POST['valor'];
$disponivel_pacote = $_POST['pacote'];

$sql = "INSERT INTO pacotes (titulo_pacote, valor_pacote, disponivel_pacote) VALUES ('$titulo_pacote', '$valor_pacote', '$disponivel_pacote')";
if (mysqli_query($conn, $sql)) {
    echo ("<h1>Pacote cadastrado com sucesso!</h1>");
} else {
    echo ("<h1>Houve um problema ao cadastrar o Pacote!</h1><br><p>" . $conn->error . "</p>");
}
