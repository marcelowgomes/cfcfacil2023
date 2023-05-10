<?php
    include_once "bd/conexao.php";
    if(isset($_POST['atualizado'])){
        $placa_veiculo = $_POST['placa'];
        $tipo_veiculo = $_POST['tipo'];
        $marca_veiculo = $_POST['marca'];
        $ano_fabricacao_veiculo = $_POST['ano_fabricacao'];
        $ano_modelo_veiculo = $_POST['ano_modelo'];
        $cor_veiculo = $_POST['cor'];

        $sql = "UPDATE veiculos SET tipo_veiculo = '$tipo_veiculo', marca_veiculo = '$marca_veiculo', ano_fabricacao_veiculo = '$ano_fabricacao_veiculo', ano_modelo_veiculo = '$ano_modelo_veiculo', cor_veiculo = '$cor_veiculo', placa_veiculo = '$placa_veiculo' WHERE id_veiculo = '$id'";
        if(mysqli_query($conn, $sql)){
            echo("<h1>Edição de veículo concluida com sucesso!</h1>");
        }else{
            echo("<h1>Houve um erro na edição do veículo</h1><br><p>".$conn->error."</p>");
        }

        mysqli_close($conn);
    }