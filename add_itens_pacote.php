<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

$sql = "SELECT * FROM pacotes p INNER JOIN subcategoria_produtos s on p.pacote_categoria = s.subcat_produto_id WHERE p.pacote_cfc = '$user[user_empresa]' and p.pacote_id = $id";
$exe = mysqli_query($conn, $sql);
$pacote = mysqli_fetch_array($exe);
?>


 

               <div>
                 
                     <div>
                        <h4>Adicionar Itens / Pacote <?php echo $pacote[subcat_produto_nome] ?> - <?php echo $pacote[pacote_descricao] ?></h4>
                       
                     </div>  </div></div>


                     
                     <BR>


<div class="col-xxl-12">
                     <div class="row">
                        <div class="col-xxl-12 col-sm-12 mb-25">
                           <!-- Card 1  -->
<div id="div-content" class="ap-po-details   radius-xl ">

<strong> Adicionar Itens </strong> <br><br>


<div class="row"> 

<div class="col-9"> <strong> Item </strong> </div>
<div class="col-1"><strong>  QTD  </strong></div>
<div class="col-2"><strong>  Ações </strong> </div>
<br><br>
</div>
<?php
$sql = "SELECT * FROM receitas_despesas  WHERE  receita_cfc = '$user[user_empresa]' and receita_ocorrencia = 'Entrada'";
$exe = mysqli_query($conn, $sql);
while($receita = mysqli_fetch_array($exe)) {


  $sql1 = "SELECT * FROM itens_pacote  WHERE  itens_p_pacote = '$id' and itens_p_produto = '$receita[receita_id]' and  itens_p_cfc = '$user[user_empresa]' ";
  $exe1 = mysqli_query($conn, $sql1);
  $itens = mysqli_fetch_array($exe1);
  $total = mysqli_num_rows($exe1);
  

?>

<?php
if($total == '0') {
?>

<form id="inserir_item_pacote" method="POST" action="inserir_item_pacote">
<div class="row"> 
<div class="col-9 " style="padding:10px"> <?php echo $receita[receita_nome] ?>  </div>
<div class="col-1"> <input class="form-control" type="number" min="0" required name="qtd">  </div>
<div class="col-2">   <button class=" btn btn-info btn-xs btn-squared">Adicionar</button>  </div>

<input name="nome" type="hidden" value="<?php echo $receita[receita_nome] ?>">
<input name="id" type="hidden" value="<?php echo $receita[receita_id] ?>">
<input name="pacote" type="hidden" value="<?php echo $id ?>">


</form>

</div>



<?php } else {  ?>


<form id="inserir_item_pacote" method="POST" action="inserir_item_pacote">
<div class="row"> 
<div class="col-9 " style="padding:10px"> <?php echo $receita[receita_nome] ?>  </div>
<div class="col-1"> <input class="form-control" type="number" min="0" value="<?php echo $itens[itens_p_qtd] ?>" required name="qtd">  </div>
<div class="col-2">   <button class=" btn btn-success btn-xs btn-squared">Atualizar</button>  </div>

<input name="nome" type="hidden" value="<?php echo $receita[receita_nome] ?>">
<input name="id" type="hidden" value="<?php echo $receita[receita_id] ?>">
<input name="pacote" type="hidden" value="<?php echo $id ?>">
<input name="id2" type="hidden" value="<?php echo $itens[itens_p_id] ?>">

</form>

</div>



  <?php } ?>
<?php } ?>







</div>
</div>
</div>
</div>



