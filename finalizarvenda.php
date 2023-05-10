<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

?>
<?php
$informado = $_POST[dinheiro] + $_POST[pix] + $_POST[credito] + $_POST[debito] + $_POST[crediario] + $_POST[cheque] ;
?>


<?php 
//// VERIFICANDO PARCELAS CREDIARIO
$crediarioinformado = $_POST[crediario];
$length_array = count($_POST['valorparcelacred']);
$soma = 0;
for ($i = 0; $i < $length_array; $i++){
    $soma = $soma + $_POST['valorparcelacred'][$i];
}
if ($crediarioinformado <> $soma) {


?>

<div class="alert alert-danger" role="alert">
Erro valores crediario</div>



<?php exit;} else { ?>
  <!-- Crediario ok -->
  <?php 
  } ?>

<?php if($informado <> $_POST[totalareceber]) { ?>


<div class="alert alert-danger" role="alert">
Valor total informado não confere com valor da venda</div>

<?php
exit; } else { ?>

<div class="alert alert-success" role="alert">
Aguarde registrando venda</div>


<?php

if($_POST[dinheiro] == '') {
$dinheiro = "0.00";
} else {
$dinheiro = "$_POST[dinheiro]";
}

if($_POST[pix] == '') {
$pix = "0.00";
} else {
$pix = "$_POST[pix]";
}

if($_POST[credito] == '') {
$credito = "0.00";
} else {
$credito = "$_POST[credito]";
}

if($_POST[debito] == '') {
$debito = "0.00";
} else {
$debito = "$_POST[debito]";
}
if($_POST[crediario] == '') {
$crediario = "0.00";
} else {
$crediario = "$_POST[crediario]";
}
if($_POST[cheque] == '') {
$cheque = "0.00";
} else {
$cheque = "$_POST[cheque]";
}
if($_POST[descontos] == '0') {
$descontos = "0.00";
} else {
$descontos = "$_POST[descontos]";
}
if($_POST[juros] == '0') {
$juros = "0.00";
} else {
$juros = "$_POST[juros]";
}  




@$conn->query($insert = "INSERT INTO caixa (caixa_juros, caixa_descontos, caixa_aluno, caixa_total, caixa_cheque, caixa_credito, caixa_pix
, caixa_debito, caixa_crediario, caixa_dinheiro, caixa_usuario, caixa_tipo, caixa_cfc) VALUES ('$juros','$descontos',
'$_POST[aluno]','$_POST[totalareceber]','$cheque','$credito','$pix','$debito','$crediario',
'$dinheiro','$user[id_user]','Entrada','$user[user_empresa]')");

$id_venda = $conn->insert_id;
//print($insert);

$conn->query("update carrinho set carrinho_status = 2 , carrinho_pedido = $id_venda  where carrinho_aluno = $_POST[aluno] and carrinho_status='1' and carrinho_cfc = $user[user_empresa] and carrinho_tipo = 'avulso' and carrinho_ocorrencia = 'Entrada' ");


//// SALVANDO DADOS CARTAO CREDITO 
if ($_POST[chkCartao] == 'sim'){
@$conn->query($insert = "INSERT INTO recebimentos_cartao (rcartao_parcelas,rcartao_venda, rcartao_cliente, rcartao_cfc, rcartao_usuario,
rcartao_valor) VALUES ('$_POST[parcelascart]', '$id_venda','$_POST[aluno]','$user[user_empresa]','$user[id_user]','$credito' )");
}

//// SALVANDO DADOS PIX
if ($_POST[checkpix] == 'sim'){
@$conn->query($insert = "INSERT INTO recebimentos_pix (pix_venda, pix_cliente, pix_cfc, pix_conta, pix_usuario,
pix_valor) VALUES ('$id_venda','$_POST[aluno]','$user[user_empresa]', '$_POST[contapix]','$user[id_user]','$pix' )");
}

//// SALVANDO DADOS CREDIARIO
if ($_POST[checkareceber] == 'sim'){
$vencimento 	 = $_POST['vencimentoparcelacred'];
$valor = $_POST['valorparcelacred'];
$parcela = $_POST['parcela'];
$quant_linhas = count($vencimento);
for ($i=0; $i<$quant_linhas; $i++) {
@$conn->query($insert = "INSERT INTO contas_areceber (areceber_vencimento, areceber_valor, areceber_venda,  areceber_cliente,  
areceber_cfc, areceber_usuario,areceber_parcela, areceber_parcelas  ) VALUES ('$vencimento[$i]', '$valor[$i]', '$id_venda','$_POST[aluno]','$user[user_empresa]','$user[user_empresa]','$parcela[$i]','$_POST[parcelas]')");
  }


}

?>




<script>
       setTimeout(function() {
         window.location.href = "venda_finalizada/<?php echo $id_venda ?>";
       }, 1000);
    </script>



<?php } ?>