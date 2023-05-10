

<?php
session_start();
include "bd/conexao.php";


$sql2 = "SELECT * from carrinho c inner join receitas_despesas rd ON c.carrinho_item = rd.receita_id where c.carrinho_status='1' ";
$exe2 = mysqli_query($conn, $sql2);
$y='0';
while($linha2 = mysqli_fetch_array($exe2)) { 
$totalitem2 = $linha2[receita_valor] * $linha2[carrinho_qtd]  ;
$y++;
  ?>

<div class="row ffp ffp--hover justify-content-between "> 
<div class="col-3 ffp__title">
<h6> 
<?php echo $linha2[receita_nome] ?>
<p class="d-block">
<?php echo $linha2[receita_observacoes] ?>
</p>
</div>
<div class="col-2"><strong> <input type="number" name="qtd" class="form-control" required min="1" value="<?php echo $linha[carrinho_qtd] ?>">  </strong></div> 
<div class="col-2"><strong> <input type="number" name="desconto" class="form-control" required value="<?php echo $linha[carrinho_desconto] ?>"> </strong></div> 
<div class="col-2"><strong> <input type="number" name="acrescimo" class="form-control" value="<?php echo $linha[carrinho_acrescimo] ?>"></strong> </div> 
<div class="col-2"><strong> R$2<?php echo number_format($totalitem2 , 2, ',', '.'); ?></strong> </div> 
<div class="col-1"><strong> <div class="row"> <div class="col-6">    <button type="submit" class="btn btn-info btn-circle btn-sm">&#8635;</button>  </div>  <div class="col-6">    <button type="submit" class="btn btn-danger btn-circle btn-sm">x</button>  </div> </div>  </strong> </div> 
<input type="hidden" name="aluno"  value="<?php echo $id ?>"> 


</div>


<?php } ?>