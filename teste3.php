<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


$qtd = $_POST['qtd']; 
$item = $_POST['item'];
$sub = $_POST['subcategoria'];
$cat = $_POST['categoria'];
$valor = $_POST['valor'];
$aluno = $_POST['aluno'];
$oco = 'Entrada';
$custo = $_POST['custo'];
if($_POST['desconto'] =='') {
$desconto = '0.00'; 
} else { 
$desconto = $_POST['desconto'];
}
if($_POST['acrescimo'] =='') {
  $acrescimo = '0.00'; 
  } else { 
  $acrescimo = $_POST['acrescimo'];
  }


$sql = "SELECT * from carrinho c inner join receitas_despesas rd ON c.carrinho_item = rd.receita_id where c.carrinho_aluno = $aluno and c.carrinho_status='1' and c.carrinho_cfc = $user[user_empresa] order by c.carrinho_id desc " ;
$exe = mysqli_query($conn, $sql);

$totalvenda = '';
$$totalacrescimo = '';
$totaldesconto = '';
$totalareceber = '';

while($linha = mysqli_fetch_array($exe)) { 

$totalareceberd = $linha[receita_valor] * $linha[carrinho_qtd] + $linha[carrinho_acrescimo] - $linha[carrinho_desconto];
$totalitem2 = $linha[receita_valor] * $linha[carrinho_qtd];
$totalvenda += $totalitem2;
$totaldesconto += $linha[carrinho_desconto];
$totalacrescimo += $linha[carrinho_acrescimo];
$totalareceber +=$totalareceberd;
}
?>
