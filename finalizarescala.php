<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

?>
<?php


@$conn->query($insert = "INSERT INTO escalas (escala_hora_inicio,escala_hora_fim,escala_veiculo,escala_tempo, escala_intervalo, escala_usuario, escala_cfc
,escala_nome ) VALUES ('$_POST[hinicio]','$_POST[hfim]',
'$_POST[veiculo]','$_POST[tempo]','$_POST[intervalo2]','$user[id_user]','$user[user_empresa]','$_POST[nome]')");


$escala = $conn->insert_id;



//// SALVANDO DADOS INTERVALOS
if ($_POST[checkareceber] == 'sim'){


$inicio = $_POST['de'];
$fim = $_POST['a'];
$motivo = $_POST['motivo'];
$intervalo = $_POST['intervalos'];
$quant_linhas = count($intervalo);



for ($i=0; $i<$quant_linhas; $i++) {
@$conn->query($insert = "INSERT INTO intervalos_escala (intervalo_escala, intervalo_inicio, intervalo_fim,  intervalo_usuario,  
intervalo_cfc,intervalo_motivo) VALUES ('$escala', '$inicio[$i]', '$fim[$i]','$user[user_empresa]','$user[user_empresa]', '$motivo[$i]')");


  }


}

?>




<script>
       setTimeout(function() {
       window.location.href = "escala_veiculos/<?php echo $escala ?>";
     }, 1000);
    </script>



