<?php
    if(isset($_POST['submit'])){
        include_once "bd/conexao.php";
        $placa_veiculo = $_POST['placa'];
        $marca_veiculo = $_POST['marca'];
        $tipo_veiculo = $_POST['tipo'];
        $ano_fabricacao_veiculo = $_POST['fabricacao'];
        $ano_modelo_veiculo = $_POST['modelo'];
        $cor_veiculo = $_POST['cor'];
        $instrutor_veiculo = $_POST['instrutor'];
        $km_inicial_veiculo = $_POST['km_inicial'];
    
        $sql = "INSERT INTO veiculos (placa_veiculo, marca_veiculo, tipo_veiculo, ano_fabricacao_veiculo, ano_modelo_veiculo, cor_veiculo, instrutor_veiculo, km_inicial_veiculo) VALUES ('$placa_veiculo', '$marca_veiculo', '$tipo_veiculo', '$ano_fabricacao_veiculo', '$ano_modelo_veiculo', '$cor_veiculo', '$instrutor_veiculo', '$km_inicial_veiculo')";
        if(mysqli_query($conn, $sql)){
            echo("<h2>Veículo cadastrado com sucesso!</h2>");
        }else{
            echo("<h2>Houve um problema no cadastro do veículo!</h2><br><p>".$conn->error."</p>");
        }
    }
