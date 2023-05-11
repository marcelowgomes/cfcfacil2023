<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>
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
        $modelo = $_POST['modelo_veiculo'];
        $categoria = $_POST['tipo'];
    
        $sql = "INSERT INTO veiculos (placa_veiculo, marca_veiculo, tipo_veiculo, ano_fabricacao_veiculo, ano_modelo_veiculo, cor_veiculo,
         instrutor_veiculo, km_inicial_veiculo,veiculo_categoria, modelo_veiculo, veiculo_cfc) 
         VALUES ('$placa_veiculo', '$marca_veiculo', '$tipo_veiculo', '$ano_fabricacao_veiculo', '$ano_modelo_veiculo', '$cor_veiculo', 
         '$instrutor_veiculo', '$km_inicial_veiculo','$categoria','$modelo','$user[user_empresa]')";



        if(mysqli_query($conn, $sql)){
           ?>
           <script>
 alert("Cadastro Realizado com sucesso");

 window.location.href = "listar_veiculo";
</script>
<?php
        }else{
            echo("<h2>Houve um problema no cadastro do veículo!</h2><br><p>".$conn->error."</p>");
        }
    }
