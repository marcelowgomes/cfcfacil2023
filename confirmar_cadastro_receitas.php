<?php
include_once "bd/conexao.php";

$tipo_receita_despesas = $_POST['tipo'];
$ocorrencia_receita_despesas = $_POST['ocorrencia'];
$incidencia_receita_despesas = $_POST['incidencia'];
$valor_receita_despesas = $_POST['valor'];
$disponivel_receita_despesas = $_POST['disponivel'];
$titulo_receita_despesas = $_POST['titulo'];
$valor_custo_receita_despesas = $_POST['valor_custo'];

$sql = "INSERT INTO receita_despesas (tipo_receita_despesas, ocorrencia_receita_despesas, incidencia_receita_despesas, valor_receita_despesas, disponivel_receita_despesas, titulo_receita_despesas, valor_custo_receita_despesas) 
VALUES ('$tipo_receita_despesas', '$ocorrencia_receita_despesas', '$incidencia_receita_despesas', '$valor_receita_despesas', '$disponivel_receita_despesas', '$titulo_receita_despesas', '$valor_custo_receita_despesas')";
if (mysqli_query($conn, $sql)) {
    echo ("<h1>Receita e despesas cadastradas com sucesso!</h1>");
} else {
    echo ("<h1>Houve um problema ao cadastrar Receitas e despesas!</h1><br><p>" . $conn->error . "</p>");
}
