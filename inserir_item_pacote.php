<?php
session_start();

 
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


$sql1 = "SELECT * FROM itens_pacote  WHERE  itens_p_id = '$_POST[id2]'  and  itens_p_cfc = '$user[user_empresa]' ";
$exe1 = mysqli_query($conn, $sql1);
$itens = mysqli_fetch_array($exe1);
$total = mysqli_num_rows($exe1);

if($_POST[qtd] == '0') { 


   $conn->query("DELETE from itens_pacote  where itens_p_id = $_POST[id2] and itens_p_cfc = $user[user_empresa]  ");
?>
<script>
alert("Removido com sucesso");
window.location.href = "add_itens_pacote/<?php echo $_POST[pacote] ?> ";

</script>
<?php exit;} 

if($total == '0') { 

$sql = "INSERT INTO itens_pacote (itens_p_produto, itens_p_qtd, itens_p_cfc, itens_p_usuario,itens_p_pacote) 
VALUES ('$_POST[id]', '$_POST[qtd]','$user[user_empresa]','$user[id_user]','$_POST[pacote]')";
if (mysqli_query($conn, $sql)) {
?>


<script>
alert("Adicionado com sucesso");
window.location.href = "add_itens_pacote/<?php echo $_POST[pacote] ?> ";

</script>


<?php
} else {
    echo ("<h1>Houve um problema ao cadastrar o Pacote!</h1><br><p>" . $conn->error . "</p>");
}
} else { 

   $conn->query("update itens_pacote set itens_p_qtd = $_POST[qtd] where itens_p_id = $_POST[id2]  and itens_p_cfc = $user[user_empresa]   ");


?>
<script>
alert("Atualizado com sucesso");
window.location.href = "add_itens_pacote/<?php echo $_POST[pacote] ?> ";

</script>


<?php } ?>