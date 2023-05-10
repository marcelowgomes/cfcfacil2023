

<?php
session_start();
include "bd/conexao.php";

$sql2a = "SELECT * from carrinho where carrinho_item = '$_GET[id]'   ";
$exe2a = mysqli_query($conn, $sql2a);
$totalitens2a =mysqli_num_rows($exe2a); 

?>
<?php if($totalitens2a == '0') { ?> 
 <button type="submit" class="btn btn-success btn-circle btn-sm">+</button> 
 <?php } ?>
 <?php if($totalitens2a > '0') { ?> 
 <button type="submit" class="btn btn-info btn-circle btn-sm">&#8635;</button> 
 <?php } ?>