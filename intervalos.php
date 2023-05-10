<?php //echo $_GET['id'] ;


/// DIVINDO PARCELAS

@$valorp1 = $_GET['id'] / $_POST['parcelas'] ;
@$valorp = str_replace(',' , '', $valorp1 ); 
?>




<div class="row">
<div class="col-2">
<strong>Intervalo</strong>
</div>

<div class="col-3" align="center">
<strong>De</strong>
</div>

<div class="col-3" align="center">
<strong> A</strong>
</div>
<div class="col-4" align="center">
<strong>Motivo</strong>
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
<input name="intervalos[]" required type="hiddena" class="form-control" value="<?php echo $x ?>">

</div>
<div class="col-3">
<input name="de[]" required type="time" class="form-control">
</div>

<div class="col-3">
<input name="a[]" required id="valorparcelacred" type="time" class="form-control" >
</div>

<div class="col-4">
<input name="motivo[]" required id="valorparcelacred" type="text" class="form-control" >
</div>

</div>

    <?php
      $i++;
  endwhile;

  ?>

<script>	
$(document).ready(function() {
 $("#finalizarescala").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'finalizarescala.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#resultsvenda").empty();
      $("#resultsvenda").append(msg);
      document.getElementById("results").style.display = "block";

    }
  });
   return false;
 });
});
</script>	