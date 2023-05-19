<?php //echo $_GET['id'] ;


/// DIVINDO PARCELAS

@$valorp1 = $_GET['id'] / $_POST['parcelas'] ;
@$valorp = str_replace(',' , '', $valorp1 ); 
?>


<?php

$parcelas = $_POST['parcelas'];
$valor = $_GET['id'];
$boletos = [];
for ($i = 1; $i <= $parcelas; $i++) array_push($boletos, round($valor / $parcelas, 0));
@$boletos[$parcelas - 1] += $valor - array_sum($boletos);
//print_r($boletos);
?>


<div class="row">
<div class="col-2">
<strong>Parcela</strong>
</div>

<div class="col-5" align="center">
<strong>Vencimento</strong>
</div>

<div class="col-5" align="center">
<strong> Valor</strong>
</div>

</div>

<?php
  $i = 1;
  $x = 0;
  $parcelas = $_POST['parcelas'];
  while ($i <= $parcelas):
    $x++ ;

    ?>



<div class="row">

<div class="col-2">
<?php echo $x ?>
<input name="parcela[]" required type="hidden" class="form-control" value="<?php echo $x ?>">

</div>
<div class="col-5">
<input name="vencimentoparcelacred[]" required type="date" class="form-control" placeholder="Vencimento Parcela"  onfocus="(this.type='date')">
</div>

<div class="col-5">
<input name="valorparcelacred[]" required id="valorparcelacred" type="text" class="form-control" placeholder="Valor Parcela" value ="<?php echo number_format($boletos[$x - 1], 2, '.', '');  ?>" onKeyPress="return(MascaraMoeda(this,'','.',event))">
</div>

</div>

    <?php
      $i++;
  endwhile;

  ?>