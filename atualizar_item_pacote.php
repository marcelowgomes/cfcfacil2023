<?php
session_start();

 
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

if($_POST[qtd] > '0') {

$conn->query("update itens_pacote set itens_p_qtd = $_POST[qtd] where itens_p_id = $_POST[id]  and itens_p_cfc = $user[user_empresa]   ");

?>
<div class=" alert alert-success  alert-dismissible fade show " role="alert">
<div class="alert-content">
  Atualizado com sucesso
   <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
      <img src="img/svg/x.svg" alt="x" class="svg" aria-hidden="true">
   </button>

</div>
</div>



<div id="aberto2<?php echo $_POST[id] ?>" style="display:block"> 
<form id="atualizar<?php echo $_POST[id] ?>" method="POST" action="#">
<div class="row"> 
<div class="col-9 " style="padding:10px"> <?php echo $_POST[receita_nome] ?>  </div>
<div class="col-1"> <input class="form-control" type="number" value="<?php echo $_POST[qtd] ?>" required name="qtd">  </div>
<div class="col-2">   <button class=" btn btn-success btn-xs btn-squared">Atualizar</button>  </div>

<input name="nome" type="hidden" value="<?php echo $_POST[receita_nome] ?>">
<input name="id" type="hidden" value="<?php echo $_POST[id] ?>">
</form>

</div>
</div>
<div id="results2<?php echo $_POST[id] ?>"> </div>
<script>
$(document).ready(function() {
 $("#atualizar<?php echo $_POST[id] ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'atualizar_item_pacote.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results2<?php echo $_POST[id] ?>").empty();
      $("#results2<?php echo $_POST[id] ?>").append(msg);
      document.getElementById("aberto2<?php echo $_POST[id] ?>").style.display = "none";


    }
  });
   return false;
 });
});

</script>



<?php } else { 
    $conn->query("DELETE from itens_pacote  where itens_p_id = $_POST[id] and itens_p_cfc = $user[user_empresa]  ");
    ?>

<div class=" alert alert-danger  alert-dismissible fade show " role="alert">
<div class="alert-content">
  Removido com sucesso
   <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
      <img src="img/svg/x.svg" alt="x" class="svg" aria-hidden="true">
   </button>

</div>
</div>

 

<form id="inserir<?php echo $receita[receita_id] ?>" method="POST" action="#">
<div class="row"> 
<div class="col-9 " style="padding:10px"> <?php echo $_POST[nome] ?>  </div>
<div class="col-1"> <input class="form-control" type="number"  required value = "" >  </div>
<div class="col-2">   <button class=" btn btn-info btn-xs btn-squared">Adicionar</button>  </div>
</form>

<?php } ?>